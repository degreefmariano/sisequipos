@extends('layouts.admin')

@section('content')

<form action="{{url('/fechasequiporesultadofinal')}}" method="get">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-0 col-xs-20">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #8B4513">
                        <span><i class="fas fa-laptop-code"></i></span>
                        CONSULTA POR FECHAS DE INGRESO DE EQUIPOS
                    </div>

                    {{ csrf_field() }}

                    <table class="table table-striped">
                        <tr style="color: black">
                            <th class="text-left" width="10">DESDE</th>
                            <th class="text-left">HASTA</th>
                        </tr>
                        <tr>
                            <!--fecha_desde-->
                            <th class="text-left">
                                <input type="date" name="fecha_desde" class="form-control" id="fecha_desde" style="width: 200px" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <!--fecha_hasta-->
                            <th class="text-left">
                                <input type="date" name="fecha_hasta" class="form-control" id="fecha_hasta" style="width: 200px" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-md" active style="background-color: #D2691E; color: white">BUSCAR</button>
                    <a href="equipo" class="btn btn-info btn-md active">VOLVER</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection