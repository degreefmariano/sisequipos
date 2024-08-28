@extends('layouts.admin')

@section('content')
<div class="col-md-15 col-md-offset-0 col-xs-20">
<form action="{{url('/estadisticasresultadofinal')}}" method="get">
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
                    <div class="panel-heading" style="color: #5b5f16">
                        <span><i class="fas fa-chart-bar"></i></span>
                        ESTADISTICAS
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
                                <input type="date" name="fecha_desde" class="form-control" id="fecha_desde"
                                    style="width: 200px" value="<?php echo date("Y-m-d");?>"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <!--fecha_hasta-->
                            <th class="text-left">
                                <input type="date" name="fecha_hasta" class="form-control" id="fecha_hasta"
                                    style="width: 200px" value="<?php echo date("Y-m-d");?>"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-md" active
                        style="background-color: #800080; color: white">BUSCAR</button>
                    <a href="servicio" class="btn btn-info btn-md active">VOLVER</a>
<br><br><br>
                    <a class="navbar-brand" href="{{url('expenses')}}" style="color: #5b5f16; font-family: roman">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span><i class="fas fa-chart-bar"></i></span>&nbsp;ESTADISTICAS&nbsp;
                    </a>


                </div>
            </div>
        </div>
    </div>
</form>
</div>
<div class="col-md-15 col-md-offset-0 col-xs-20">
    <a class="navbar-brand" href="{{url('expenses')}}" style="color: #5b5f16; font-family: roman">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span><i class="fas fa-chart-bar"></i></span>&nbsp;ESTADISTICAS&nbsp;
    </a>
</div>



@endsection