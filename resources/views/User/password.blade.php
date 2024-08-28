@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CAMBIAR MI CONTRASEÑA</div>

                <div class="panel-body">
                    <!--MENSAJE-->
                    @if (Session::has('message'))
                    <div class='bg-warning' style='padding: 20px'>
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

                    <form class="form-horizontal" method="POST" action="{{url('user/updatepassword')}}" role="form">
                        {{csrf_field()}}

                        <!--mypassword-->
                        <div class="form-group">
                            <label for="mypassword" class="col-md-4 control-label">Introduce tu actual
                                contraseña</label>
                            <div class="col-md-6">
                                <input id="mypassword" type="password" class="form-control" name="mypassword">
                                @if ($errors->has('mypassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mypassword') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--password-->
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Introduce tu nueva contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--password_confirmation-->
                        <div class="form-group">
                            <label for="mypassword" class="col-md-4 control-label">Confirma tu nueva contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <!--editar formulario-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fas fa-marker"></i> Cambiar mi contraseña
                                </button>

                                <a href="javascript:history.back()" class="btn btn-info btn-md" style="font-size: 14px">
                                    <i class="fas fa-angle-double-left"></i> Volver
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection