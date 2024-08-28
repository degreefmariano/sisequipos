@extends('layouts.admin')

@section('content')

@if (Auth::user()->role == 'admin')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>

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

                    <form class="form-horizontal" method="POST" action="{{ route('user.update',$user->id) }}"
                        role="form">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">

                        <!--id-->
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ $user-> id }}"
                                    required>

                                @if ($errors->has('id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--name-->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Apellido y Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user-> name }}"
                                    required>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--username-->
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username"
                                    value="{{ $user-> username }}" required>

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--role-->
                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Rol</label>
                            <div class="col-md-6">
                                @if($user-> role == 'admin')
                                <select id="role" type="role" class="form-control" name="role"
                                    value="{{ $user -> role }}" required>{{ $user -> role }}
                                    <option value="admin"> Administrador </option>
                                    <option value="user"> Usuario </option>
                                </select>
                                @elseif($user-> role == 'user')
                                <select id="role" type="role" class="form-control" name="role"
                                    value="{{ $user -> role }}" required>{{ $user -> role }}
                                    <option value="user"> Usuario </option>
                                    <option value="admin"> Administrador </option>
                                </select>
                                @endif

                                @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--active-->
                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="active" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                @if($user-> active == '1')
                                <select id="active" type="active" class="form-control" name="active"
                                    value="{{ $user -> active }}" required>{{ $user -> active }}
                                    <option value="1"> Activo </option>
                                    <option value="0"> Inactivo </option>
                                </select>
                                @elseif($user-> active == '0')
                                <select id="active" type="active" class="form-control" name="active"
                                    value="{{ $user -> active }}" required>{{ $user -> active }}
                                    <option value="0"> Inactivo </option>
                                    <option value="1"> Activo </option>
                                </select>
                                @endif


                                @if ($errors->has('active'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('active') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--password-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input id="password" type="hidden" class="form-control" name="password"
                                    value="{{ $user-> password }}">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                       
                        <!--editar Usuario-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fas fa-marker"></i> Editar Usuario
                                </button>

                                <a href="javascript:history.back()" class="btn btn-info btn-md"
                                    style="font-size: 14px; font-family: garamond">
                                    <i class="fas fa-angle-double-left"></i> Volver Atrás
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection