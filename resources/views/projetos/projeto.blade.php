@extends('layouts.app')

@section('title', 'Projeto - '. $projeto->titulo)

@section('content')

    <div id="projeto">

        <div class="banner-page d-flex justify-content-center align-items-center mb-5"
            style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
            <div class="container">
                <div class="content d-flex justify-content-center">
                    <h1 class="text-uppercase text-white">{{ $projeto->titulo }}</h1>
                </div>
            </div>
        </div>


        <div class="container">


            <div class="row">

                @foreach ($imagens as $imagem)

                    <div class="col-12 col-md-3 mb-4">
                        <a href="{{ asset('storage/' . $imagem->imagem) }}" data-fancybox="{{ $projeto->slug }}">
                            <img class="w-100" src="{{ asset('storage/' . $imagem->thumbnail) }}" alt="">
                        </a>
                    </div>

                @endforeach

            </div>
        </div>

    </div>

@endsection
