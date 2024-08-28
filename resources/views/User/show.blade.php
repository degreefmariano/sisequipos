@extends('layouts.admin')

@section('content')

@if (Auth::user()->role == 'admin')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Usuario</div>

                <div class="panel-body">
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

                    <form class="form-horizontal" method="POST" action="{{ route('user.show',$user->id_users) }}"
                        role="form">
                        {{ csrf_field() }}

                        <!--name-->
                        <div class="form-group">
                            <label class="col-md-3">Apellido y Nombre:</label>
                            <label><strong>{{ $user-> name }}</strong></label>
                        </div>
                        <!--username-->
                        <div class="form-group">
                            <label class="col-md-3">Usuario:</label>
                            <label><strong>{{ $user-> username }}</strong></label>
                        </div>
                        <!--role-->
                        <div class="form-group">
                            <label class="col-md-3">Rol:</label>
                            <label>
                                <strong>
                                    @if($user-> role == 'admin')
                                    <td align="left" class="arreglotexto" width="300">
                                        {{ 'Administrador' }}
                                    </td>
                                    @elseif ($user-> role == 'user')
                                    <td align="left" class="arreglotexto" width="300">
                                        {{ 'Usuario' }}
                                    </td>
                                    @endif
                                </strong>
                            </label>
                        </div>
                        <!--active-->
                        <div class="form-group">
                            <label class="col-md-3">Estado:</label>
                            <label>
                                <strong>
                                    @if($user-> active == '1')
                                    <td align="left" class="arreglotexto" width="300">
                                        {{ 'Activo' }}
                                    </td>
                                    @else
                                    <td align="left" class="arreglotexto" width="300">
                                        {{ 'Inactivo' }}
                                    </td>
                                    @endif
                                </strong>
                            </label>
                        </div>

                        <div>
                            <a href="javascript:history.back()" class="btn btn-info btn-md"
                                style="font-size: 14px; font-family: garamond">
                                <i class="fas fa-angle-double-left"></i> Volver Atrás
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@else

@endif

@endsection