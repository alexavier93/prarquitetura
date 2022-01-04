<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/assets/images/favicon.ico') }} ">

    <title>@yield('title')</title>
    
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

</head>
<body>
    
    <header>
        <div class="header-nav">

            <div class="container">
                <div class="wrap">

                    <div class="logo">
                        <a href="{{ route('home') }}" class="logo-main"><img class="img-fluid" src="{{ asset('assets/images/logo-pr-arquitetura.png') }}" alt=""></a>
                        <a href="{{ route('home') }}" class="logo-fix"><img class="img-fluid" src="{{ asset('assets/images/logo-pr-arquitetura.png') }}" alt=""></a>
                    </div>
    
                    <div class="menu">
    
                        <nav class="nav">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('home') }}">Prancheta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Urbanismo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Institucional</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Unifamiliar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Multifamiliar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Comercial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Industrial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Contato</a>
                                </li>
                            </ul>
                        </nav> 
    
                    </div>

                    <div class="social-media">
                        <ul class="nav justify-content-start list-unstyled d-flex mb-2">
                            <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-instagram"></i></a></li>
                            <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-twitter"></i></a></li>
                            <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-youtube"></i></a></li>
                        </ul>

                    </div>
    
                    <div class="icon-sidemenu d-xl-none d-flex flex-grow-1
                        justify-content-end align-items-center">
                        <a href="javascript:void(0)" class="sidemenu_btn"
                            id="sidemenu_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
    
                </div>

            </div>

            <!--Side Nav-->
            <div class="side-menu hidden">
                <div class="inner-wrapper">
                    <span class="btn-close" id="btn_sideNavClose"><i></i></span>
                    <nav class="side-nav w-100">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('home') }}">Prancheta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Urbanismo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Institucional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Unifamiliar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Multifamiliar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Comercial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Industrial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contato.index') ? 'active' : '' }}" href="{{ route('contato.index') }}">Contato</a>
                            </li>
                        </ul>
                    </nav>

                </div>

            </div>

            <a id="close_side_menu" href="javascript:void(0);"></a>

        </div>

    </header>

    <main role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-top pt-5 mt-5">

        <div class="container">

            <div class="row align-items-end">

                <div class="col-md-4">
                    <img class="mb-4" src="{{ asset('assets/images/logo-branco-pr-arquitetura.png') }}" alt="" width="100">

                    <h3 class="text-white">ENTRE EM CONTATO</h3>

                    <p class="text-white">Mauris facilisis tortor at dolor tempor iaculis. Nulla suscipit cursus odio, eget viverra diam ullamcorper et. Integer eu vehicula mauris. Aenean id mattis sem, eu porttitor erat.</p>

                </div>


                <div class="col-md-4 d-flex justify-content-start justify-content-lg-end">

                    <ul class="contact nav list-unstyled d-flex flex-column mb-2">
                        <li class="me-4 text-white"><i class="fab fa-whatsapp fs-5"></i> 11 99999-8888</li>
                        <li class="me-2 text-white"><i class="far fa-envelope fs-6"></i> contato@seudominio.com.br</li>
                        <li class="me-2 text-white"><i class="fas fa-map-marker-alt fs-6"></i> 11 8888-9999</li>
                    </ul>
                </div>


                <div class="col-md-4 d-flex justify-content-start justify-content-lg-end">

                    <ul class="nav justify-content-start list-unstyled d-flex mb-2">
                        <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-instagram"></i></a></li>
                        <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-twitter"></i></a></li>
                        <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="me-2"><a href="" class="btn btn-circle btn-outline-white"><i class="fab fa-youtube"></i></a></li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="bg-primary mt-4">
            <div class="container">
                <div class="d-md-flex justify-content-md-between p-1">
                    <p class="text-white m-0">© {{ now()->year }} PR Arquitetura. Todos os direitos reservados.</p>
                    <p class="text-white m-0">Desenvolvido por: <a href="" class="text-white">Agência Affinity</a></p>
                </div>
            </div>
        </div>




    </footer>
    <!-- End Footer -->

    <script src="{{ asset('/assets/js/app.js') }} "></script>

</body>
</html>
