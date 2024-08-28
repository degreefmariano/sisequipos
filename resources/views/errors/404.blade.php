@extends('home_errors')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<title>@yield('title', 'Página no encontrada')</title>-->   
    </head>
    <body>
        @yield('content')
        <!-- Scripts -->
        <!--ESTE SCRIPT NO PERMITE VER LA OPCION SALIR-->
        <!--<script src="{{ asset('js/app.js') }}"></script>-->
        <!--<section class="container" style="text-align: center">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"
                    style="font-family: Garamond; font-size: 26px; text-align: center">
                    <p> Página no encontrada</p>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                	<a href="javascript:history.back()" class="btn btn-info btn-md" style="font-size: 14px;
                		font-family: garamond">
                    	<i class="fas fa-angle-double-left"></i> Volver Atrás
                	</a>
                </div>


            </div>
        </section>-->
    </body>
</html>
