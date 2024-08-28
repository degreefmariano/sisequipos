<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Página no encontrada')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.3.1-web/css/all.css') }}">

</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
    </nav>

    @yield('content')

    <section class="container" style="text-align: center">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 100px">
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"
                style="font-family: Garamond; font-size: 30px; text-align: center">
                <i class="far fa-hand-paper"></i>
                <br><br>
                <p>Página no encontrada</p>
            </div>
            <br><br><br><br><br><br><br><br>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 50px"
                style="font-size: 12px; font-family: bold">
                <p>¡La página que está intentando visitar no existe!</p>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <a href="javascript:history.back()" class="btn btn-info btn-md" style="font-size: 16px;
                        font-family: garamond; background-color: orange; color: white">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 100px">
            </div>
        </div>
    </section>

    <footer>
        <!--<div class="panel-footer">-->
        <div style="font-family: Garamond; font-size: 14px">
            <center>BLM Casa de Informática</center>
        </div>
    </footer>

    <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!--ACA ESTA EL SELECTPICKER EN LA PARTE INFERIOR-->
    <script src="{{ asset('plugins/datepicker/js/jquery.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/datepicker-es.js') }}"></script>
    <script>
        $("#datepicker").datepicker($.datepicker.regional["es"]);
    </script>
</body>

</html>