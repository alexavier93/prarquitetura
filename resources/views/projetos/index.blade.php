@extends('layouts.app')

@section('title', 'PR Arquitetura - Projetos')

@section('content')

    <div id="projetos">

        <div class="banner-page d-flex justify-content-center align-items-center mb-5"
            style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
            <div class="container">
                <div class="content d-flex justify-content-center">
                    <h1 class="text-uppercase text-white">Projetos</h1>
                </div>
            </div>
        </div>


        <div class="container">

            <div class="row">


                <div class="col-lg-3">

                    <nav class="nav flex-column nav-pills mb-5">

                        <button class="nav-link mb-2" data-filter="all">Todos</button>
    
                        @foreach ($categorias as $categoria)
                            <button class="nav-link mb-2" data-filter=".{{ $categoria->slug }}">{{ $categoria->nome }}</button>
                        @endforeach
                        
                      </nav>
                </div>

                <div class="col-lg-9">
                    <div class="mix-projetos">
                        <div class="row">
        
                            @foreach ($projetos as $projeto)
        
                                <div class="col-12 col-md-4 item mix mb-4 {{ $projeto->categoriaSlug }}">
                                    <a href="{{ route('projetos.info', ['slug' => $projeto->slug]) }}">
                                        <img class="w-100" src="{{ asset('storage/' . $projeto->imagem) }}" alt="{{ $projeto->titulo }}" title="{{ $projeto->titulo }}">
                                    </a>
                                </div>
        
                            @endforeach
        
                        </div>
                    </div>
                </div>


            </div>

            

        </div>

    </div>

@endsection
