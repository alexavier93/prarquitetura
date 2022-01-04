<?php

namespace App\Http\Controllers;

use App\Models\Arquiteto;
use App\Models\Banner;
use App\Models\Projeto;
use App\Models\ProjetoImagem;

class HomeController extends Controller
{

    public function index()
    {

        $banners = Banner::all();

        $projetos = Projeto::where('status', 1)->get();
        $imagens = ProjetoImagem::get();

        $arquitetos = Arquiteto::get();


        return view('home.index', compact('banners', 'projetos', 'imagens', 'arquitetos'));
    }
}
