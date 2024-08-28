@extends('home_equipo')

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

                    <form class="form-horizontal" method="POST" action="{{url('admin/createadmin')}}">
                        {!! csrf_field() !!}
                        <!--name-->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Apellido y Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    required autofocus>

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
                                    value="{{ old('username') }}" required>

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
                                <select id="role" type="role" class="form-control" name="role" value="{{ old('role') }}"
                                    required>
                                    <option value="" disabled selected>---- Seleccionar ----</option>
                                    <option value="admin"> Administrador </option>
                                    <option value="user"> Usuario </option>
                                </select>

                                @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--password-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--password_confirm-->
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">
                                Confirma contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registro
                                </button>
                            </div>
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