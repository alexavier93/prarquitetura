<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Projeto;
use App\Models\ProjetoImagem;
use Illuminate\Support\Facades\DB;

class ProjetoController extends Controller
{
    public function index()
    {

        $categorias = Categoria::get();

        $imagens = ProjetoImagem::get();

        $projetos = DB::table('projetos')
            ->leftJoin('categorias', 'categorias.id', '=', 'projetos.categoria_id')
            ->where('projetos.status', '=', '1')
            ->select('projetos.*', 'categorias.slug as categoriaSlug')
            ->orderBy('id', 'desc')
            ->get();


        return view('projetos.index', compact('categorias', 'projetos', 'imagens'));
        
    }

    public function info($slug)
    {

        $projeto = Projeto::where('slug', $slug)->firstOrFail();

        $imagens = $projeto->imagens()->get();

        return view('projetos.projeto', compact('projeto', 'imagens'));
    }
}
