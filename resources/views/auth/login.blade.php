@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!-- Enlaza los estilos de Bootstrap -->
    <link href="{{ asset('plugins/bootstrap-5.3.2-dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {{-- Estilo del login --}}
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.3.1-web/css/all.css') }}">

    <div class="container" style="font-family: garamond">
        <div class="row" style="font-size: 16px">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!--MENSAJE-->
                        @if (Session::has('message'))
                            <div class='bg-success' style='padding: 16px; font-family: roman; text-align: center'>
                                {{Session::get('message')}}
                            </div>
                            <hr />
                        @endif
                        @if (Session::has('error'))
                            <div class='bg-danger' style='padding: 20px'>
                            {{Session::get('error')}}
                            </div>
                            <hr />
                        @endif

                        <div class="wrapper">
                            <div class="logo">
                                <p><img src="images/sellopolice4.jpg"></p>
                            </div>
                            <div class="text-center mt-4 name">
                                Sistema de Equipos
                            </div>
                            
                            {{-- NUEVO LOGIN --}}
                            <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                
                                {{-- USERNAME --}}
                                <div class="form-field d-flex align-items-center{{ $errors->has('username') ? ' has-error' : '' }}">
                                    {{-- <span class="far fa-user"></span> --}}
                                    <input type="text" name="username" id="username" placeholder="Usuario" value="{{ old('username') }}" style="color:green" autofocus="autofocus">
                                    <input style="color: green; font-family: garamond; font-size: 20px" id="active"
                                        type="hidden" class="form-control" name="active" value="{{ old('active') }}"
                                        autofocus="autofocus">
    
                                    @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{-- El campo username es obligatorio. --}}
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                                <script>
                                    function mostrarContrasena() {
                                        var tipo = document.getElementById("password");
                                        if (tipo.type == "password") {
                                            tipo.type = "text";
                                        } else {
                                            tipo.type = "password";
                                        }
                                    }
                                </script>

                                {{-- PASSWORD --}}      
                                <div class="form-field d-flex align-items-center{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{-- <span class="fas fa-key"></span> --}}
                                    <input type="password" name="password" id="password" placeholder="Contraseña" style="color:green">
                                    <div>
                                        <button class="btn btn" type="button" onclick="mostrarContrasena()" style="background-color: #e5e5e5; color:gray">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                    </div>
                                </div>                              

                                {{-- El campo password es obligatorio. --}}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <button class="btn mt-3">Login</button>
                            </form>
                            <br>
                            <div class="text-center fs-6">
                                <div style="text-align: center; font: Arial; font-size: 11px; color:#1a3543">
                                    División Informática Policial (DIP)
                                </div>
                                <div style="text-align: center; font: Garamond; font-size: 11px; color:#1a3543">
                                    Policía de Investigaciones (PDI)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-5.3.2-dist/js/bootstrap.min.js') }}"></script>
@endsection