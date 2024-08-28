@extends('layouts.admin')

@section('content')

@if (Auth::user()->role == 'admin')

<div class="container">

    <!--INICIO BUSCADORES-->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    Lista de usuarios
                </strong>
            </div>
        </div>
        <!--MENSAJE-->
        @if (Session::has('message'))
        <div class='bg-info' style='padding: 20px'>
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
        <!--COLUMNA 1-->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
        </div>
        <!--COLUMNA 2-->
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
        </div>
        <!--COLUMNA 3-->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align: right; width: 200px">
            <form>
                {{csrf_field()}}
                <div class="input-group input-group-md">
                    <div class="input-group">
                        <input type="text" class="form-control" name="searchText" placeholder="Buscar..."
                            value="{{$searchText}}" title="Buscar por Usuario">
                        <span class="input-group-addon" id="search" style="background-color: #e5e5e5">
                            <button class="btn btn-default btn-xs" style="background-color: #e5e5e5"
                                title="Buscar por Buscar por Usuario">
                                <span aria-hidden="true"><i class="fas fa-search"></i></span>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <!--COLUMNA 4-->
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="text-align: right">
            <div class="input-group input-group-md">
                <a href="{{url('fechas_formulario')}}" class="btn btn-default btn-md active" title="Buscar por Fecha de exámen"
                    style="background-color: #e5e5e5">Buscar por Fecha de ingreso de Usuario
                    <span><i class="fas fa-search"></i></span></a>
            </div>
        </div>
    </div>
    <!--FIN BUSCADORES-->

    @if($users->count())
    <!--lg md sm xs -->
    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-left">Apellido y Nombre</th>
                        <th class="text-left">Rol</th>
                        <th class="text-left">Estado</th>
                        <th class="text-center">Ver</th>
                        <th class="text-center">Editar</th>
                        <!--<th class="text-center">Contraseña</th>-->
                    </tr>
                </thead>

                @foreach($users as $user)
                <tbody>
                    <tr>
                        <!--name-->
                        <td align="left" class="arreglotexto" width="400">
                            {{ $user-> name }}</td>

                        <!--role-->
                        @if($user-> role == 'admin')
                        <td align="left" class="arreglotexto" width="400">
                            {{ 'Administrador' }}</td>
                        @elseif ($user-> role == 'user')
                        <td align="left" class="arreglotexto" width="400">
                            {{ 'Usuario' }}</td>
                        @endif

                        <!--active-->
                        @if($user-> active == '1')
                        <td align="left" class="arreglotexto" width="400">
                            {{ 'Activo' }}</td>
                        @else
                        <td align="left" class="arreglotexto" width="400">
                            {{ 'Inactivo' }}</td>
                        @endif

                        <!--ver-->
                        <td align="center">
                            <a class="btn btn-primary btn-sm" href="{{action('UsersController@show', $user->id)}}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>

                        <!--editar-->
                        <td align="center">
                            <a class="btn btn-primary btn-sm"
                                href="{{action('UsersController@edit', Crypt::encrypt($user->id))}}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        {{ $users->links() }}
    </div>

</div>
@else
<table class="table table-striped">
    <tr style="background: #e5e5e5">
        <td align="left">
            <p class="text-danger">USUARIOS INEXISTENTES</p>
        </td>
    </tr>
</table>
@endif

@else

@endif

@endsection