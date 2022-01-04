<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Projeto;
use App\Models\ProjetoImagem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjetoController extends Controller
{

    private $projeto;

    public function __construct(Projeto $projeto)
    {
        $this->projeto = $projeto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = $this->projeto->all();

        return view('admin.projetos.index', compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categorias = Categoria::all();

        return view('admin.projetos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $slug = Str::slug($request->titulo, '-');
        $data['slug'] = $slug;

        $projeto = $this->projeto->create($data);

        flash('Registro criado com sucesso!')->success();
        return redirect()->route('admin.projetos.edit', ['projeto' => $projeto->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($projeto)
    {
        $projeto = $this->projeto->findOrFail($projeto);

        $categorias = Categoria::all();

        return view('admin.projetos.edit', compact('projeto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projeto)
    {
        $data = $request->all();
        
        $projeto = $this->projeto->find($projeto);

        $slug = Str::slug($request->titulo, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('imagem')) {

            if (Storage::disk('public')->exists($projeto->imagem)) {
                Storage::disk('public')->delete($projeto->imagem);
            }

            $imagem = $request->file('imagem')->store('projetos/'.$projeto->id.'/', 'public');
            $data['imagem'] = $imagem;

            // Redimensionando a imagem
            $image = Image::make(public_path("storage/{$imagem}"))->fit(415, 255);
            $image->save();
        }

        $projeto->update($data);

        flash('Registro atualizado com sucesso!')->success();
        return redirect()->route('admin.projetos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        $projeto = $this->projeto->find($id);

        if ($projeto->delete() == TRUE) {


            $images = ProjetoImagem::where('projeto_id', $id)->get();

            foreach($images as $image){

                $image->delete();

                if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                    Storage::disk('public')->delete($image->thumbnail);
                }

            }

            flash('Registro removido com sucesso!')->success();
            return redirect()->route('admin.projetos.index');
        }
    }


    /*
    * GALERIA
    */

    public function getProjeto()
    {

        $projeto_id = $_POST["projeto_id"];

        $images = ProjetoImagem::where('projeto_id', $projeto_id)->get();

        $html = '';

        foreach ($images as $image) {

            $html .= '

                <div class="col-md-4 col-lg-2 mb-3">
        
                    <div class="card">
                        <div class="img"><img src="' . asset('storage/' . $image->thumbnail) . '" class="card-img-top"></div>
                        <div class="p-2 text-center">
                            <button type="button" class="btn btn-sm btn-default delete_image" data-toggle="modal" data-target="#modalDelete" data-id="' . $image->id . '" data-url="' . route('admin.projetos.deleteImagem') . '" ><i class="far fa-trash-alt"></i> Eliminar</button>
                        </div>
                    </div>
                
                </div>
            ';
        }

        echo json_encode($html);
    }

    public function uploadProjeto(Request $request)
    {
        $projeto_id = $request->projeto_id;

        if ($request->TotalFiles > 0) {

            for ($x = 0; $x < $request->TotalFiles; $x++) {

                if ($request->hasFile('images' . $x)) {

                    $image = $request->file('images' . $x);

                    $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

                    $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
                    $input['image'] = $hash . '.' . $image->extension();

                    $dir = 'projetos/'. $projeto_id;

                    if (!Storage::disk('public')->exists($dir)) {
                        Storage::disk('public')->makeDirectory($dir, 0755, true, true);
                    }

                    $filePath = public_path('storage/' . $dir);

                    $img = Image::make($image->path());

                    $img->fit(750, 500, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath . '/' . $input['thumbnail']);

                    $image->move($filePath, $input['image']);

                    $data[$x]['projeto_id'] = $projeto_id;
                    $data[$x]['imagem'] = $dir .'/'. $input['image'];
                    $data[$x]['thumbnail'] = $dir .'/'. $input['thumbnail'];
                }
            }

            //inserir no banco
            ProjetoImagem::insert($data);

            $response = array('success' => 'Upload de imagens feito com sucesso');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

    public function deleteImagem(Request $request)
    {

        $id = $request->id;

        $image = ProjetoImagem::find($id);

        if ($image->delete()) {

            if (Storage::disk('public')->exists($image->imagem)) {
                Storage::disk('public')->delete($image->imagem);
                Storage::disk('public')->delete($image->thumbnail);

                $response = array('success' => 'Imagem removida com sucesso!');
            }

        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

}
