<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')Sistema de Gestión de Equipos</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.3.1-web/css/all.css') }}">

    <!--ACA ESTA EL SELECTPICKER EN LA PARTE SUPERIOR-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-select-1.13.14/dist/css/bootstrap-select.css') }}">
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!--HOME-->
                <a class="navbar-brand" href="{{url('expenses')}}" style="font-family: roman">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-home"></i></span>&nbsp;HOME&nbsp;
                </a>
                <!--INGRESAR EQUIPO-->
                <a class="navbar-brand" href="{{url('equipo/create')}}" style="color: #D2691E; font-family: roman">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-laptop"></i></span>&nbsp;INGRESAR EQUIPOS&nbsp;
                </a>
                <!--CONSULTAR EQUIPOS-->
                <a class="navbar-brand" href="{{url('equipo')}}" style="color: #8B4513; font-family: roman">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-laptop-code"></i></span>&nbsp;CONSULTAR EQUIPOS&nbsp;
                </a>
                <!--CONSULTAR SERVICIOS-->
                <a class="navbar-brand" href="{{url('servicio')}}" style="color: #800080; font-family: roman">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-medkit"></i></span>&nbsp;CONSULTAR SERVICIOS&nbsp;
                </a>
                <!--ESTADISTICAS-->
                <a class="navbar-brand" href="{{url('estadisticas')}}" style="color: #5b5f16; font-family: roman">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-chart-bar"></i></span>&nbsp;ESTADISTICAS&nbsp;
                </a>
                <!--ESTADISTICAS-->
                <a class="navbar-brand" href="{{url('estadisticas2')}}" style="color: #5b5f16; font-family: roman">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-chart-bar"></i></span>&nbsp;ESTADISTICAS2&nbsp;
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            style="color: MEDIUMSEAGREEN; font-family: roman; text-transform: uppercase">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{url('sisequipos/public/user/password')}}" style="color: #FF7F50; font-family: roman">
                                    <span style="color: #FF7F50"><i class="fas fa-key"></i></span>&nbsp;
                                    Cambiar mi Contraseña
                                </a>
                                <a href="{{ route('logout') }}" style="color: red; font-family: roman" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>&nbsp;
                                    Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="text-center fs-6">
            <div style="text-align: center; font: Arial; font-size: 11px; color:#1a3543">
                División Informática Policial (DIP)
            </div>
            <div style="text-align: center; font: Garamond; font-size: 11px; color:#1a3543">
                Policía de Investigaciones (PDI)
            </div>
        </div>
    </footer>

    <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!--ACA ESTA EL SELECTPICKER EN LA PARTE INFERIOR-->
    <script src="{{ asset('bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('bootstrap-select-1.13.14/dist/js/i18n/defaults-*.min.js') }}"></script>

</body>

</html>