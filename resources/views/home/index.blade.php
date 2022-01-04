@extends('layouts.app')

@section('title', 'PR Arquitetura')

@section('content')

    <!-- Home -->
    <div id="home">

        <div class="main-slider">
            <div class="swiper swiperSlideHome">
                <div class="swiper-wrapper">

                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <div class="slide d-flex align-items-end"
                                style="background-image: url({{ asset('storage/'. $banner->image) }});">
                                <div class="container d-flex justify-content-center justify-content-md-end">
                                    <div class="content text-end">

                                        <div class="title mb-5">{{ $banner->title }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <div class="projetos py-5">

            <div class="container">

                <div class="heading text-center text-primary text-uppercase mb-4">Projetos</div>

                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiliusmod
                    temporate incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                    veniam, quis nostrudiata exercitation ullamcdio laboris nisi ut aliquip ex e a commodo consequat
                    exceptateur sint occaecat cupidatat non proident.</p>


                <div class="row">

                    @foreach ($projetos as $projeto)
                        
                    

                    <div class="col-md-4 mb-5">
                        <a href="{{ route('projetos.info', ['slug' => $projeto->slug]) }}">
                            <img src="{{ asset('storage/' . $projeto->imagem) }}" alt="{{ $projeto->titulo }}" title="{{ $projeto->titulo }}" class="mb-3">
                            <p class="text-primary m-1">{{ $projeto->titulo }}</p>
                        </a>
                    </div>

                    @endforeach

                </div>

                <div class="text-center">
                    <a href="{{ route('projetos.index') }}" class="btn btn-outline-primary rounded-0 py-2 px-3 text-uppercase">Ver todos os projetos</a>
                </div>
            </div>
        </div>

        <div class="arquitetos py-5">

            <div class="container">

                <div class="heading text-center text-white text-uppercase mb-4">Arquitetos</div>


                <div class="swiper swiperCarouselArquitetos">
                    <div class="swiper-wrapper">

                        @foreach ($arquitetos as $arquiteto)
                        
                        <div class="swiper-slide">

                            <div class="bg-dark p-4">
                                <h4 class="text-white">{{ $arquiteto->nome }}</h4>

                                <div class="text-white descricao">

                                    {!! $arquiteto->descricao !!}

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>


    </div>
    <!-- End Home -->

@endsection
