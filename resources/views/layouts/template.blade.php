<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Curso Mentoria Laravel 10 - Udemy">
    <meta name="author" content="Felipe Akel Carvalho Florentino">
    <title>SG - @yield('titulo')</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Alertas com o Toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/icones/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('img/icones/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('img/icones/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{ asset('img/icones/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('img/icones/safari-pinned-tab.svg') }}" color="#712cf9">
    <link rel="icon" href="{{ asset('img/icones/favicon.ico') }}">
    <meta name="theme-color" content="#712cf9">

</head>

<body>

    @include('layouts._partial.icon')

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Super Gestão - SG</a>
        <span style="padding-right: 30px;">Felipe Akel Carvalho Florentino</span>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="bi">
                        <use xlink:href="#list" />
                    </svg>
                </button>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            
            @include('layouts._partial.menu')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                
                @yield('conteudo')
                
            </main>
        </div>
    </div>
    {{-- Ajax --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="{{ asset('js/bootstrap.bundle.js') }}" ></script>
    <script src="{{ asset('js/color-modes.js') }}"></script>
    <script src="{{ asset('js/chart.umd.js') }}" ></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    {{-- BlocUI loading --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script> --}}

    <script src="{{ asset('js/super-gestao.js') }}"></script>

    {{-- Alertas com o Toastr --}}
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
