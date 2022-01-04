<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arquiteto;
use Illuminate\Http\Request;

class ArquitetoController extends Controller
{

    
    private $arquiteto;

    public function __construct(Arquiteto $arquiteto)
    {
        $this->arquiteto = $arquiteto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arquitetos = $this->arquiteto->all();

        return view('admin.arquitetos.index', compact('arquitetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.arquitetos.create');
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

        if($request->descricao == ''){

            flash('Preencher o campo descrição')->warning();
            return redirect()->route('admin.arquitetos.create');

        }else{

            $this->arquiteto->create($data);

            flash('Registro criado com sucesso!')->success();
            return redirect()->route('admin.arquitetos.index');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($arquiteto)
    {
        $arquiteto = $this->arquiteto->findOrFail($arquiteto);
        return view('admin.arquitetos.edit', compact('arquiteto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $arquiteto)
    {
        $data = $request->all();
        
        $arquiteto = $this->arquiteto->find($arquiteto);

        
        if($request->descricao == ''){

            flash('Preencher o campo descrição')->warning();
            return redirect()->route('admin.arquitetos.edit', ['arquiteto' => $arquiteto->id]);

        }else{

            $arquiteto->update($data);

            flash('Registro atualizado com sucesso!')->success();
            return redirect()->route('admin.arquitetos.index');
        }



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

        $arquiteto = $this->arquiteto->find($id);

        if ($arquiteto->delete() == TRUE) {

            flash('Registro removido com sucesso!')->success();
            return redirect()->route('admin.arquitetos.index');
        }
    }


}
