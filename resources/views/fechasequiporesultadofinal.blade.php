@extends('layouts.admin')

@section('title', 'SGE')

@section('content')

<style type='text/css'>
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #dbeddc;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="color: #8B4513; background-color: LIGHTGRAY">
                    <span><i class="fas fa-laptop-code"></i></span>
                    TOTAL DE EQUIPOS: {{ $a}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <div class="panel panel-default">
            <div style="overflow:scroll;height:340px;width:100%;overflow:auto">
                <table class="table table-striped">
                    <tr style="background-color: DARKSEAGREEN">
                        <th width="8%">SERIE DIP</th>
                        <th width="11%">FECHA INGRESO</th>
                        <th width="10%">TIPO</th>
                        <th width="15%">MARCA</th>
                        <th width="30%">DEPENDENCIA</th>
                        <th width="15%">TELEFONO</th>
                        <th style="text-align: center;" colspan="4" width="15%">OPCIONES</th>
                    </tr>
                    @if($equipos->count())
                    @foreach($equipos as $equipo)
                    <tr>
                        <td align="left">{{ $equipo -> id }}</td>
                        <td align="left">
                            <!--{{ $equipo -> fecha_alta }}-->
                            <?php
                                        $originalDate = $equipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                            {{ $newDate }}
                        </td>
                        <td align="left">{{ $equipo -> tipo }}</td>
                        <td align="left">{{ $equipo -> marca }}</td>
                        <td align="left">{{ $equipo -> unidad_destino }}</td>
                        <td align="left">{{ $equipo -> telefono }}</td>
                        <!--Opciones-->
                        <td align="center">
                            <a style="font-size: 16px; color: #008080" title="VER EQUIPO"
                                class="btn btn-Default btn-xs active" role="button"
                                href="{{action('EquiposController@show', $equipo->id)}}">
                                <span><i style="font-size: 20px" class="fas fa-eye">
                                    </i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <table class="table table-striped">
                        <tr style="background: #e5e5e5">
                            <td align="left" >
                                <?php $f1 = date("d/m/Y", strtotime($f1));?>
                                <?php $f2 = date("d/m/Y", strtotime($f2));?>
                                <h5 class="text-danger">NO HUBO INGRESO DE EQUIPOS ENTRE LAS FECHAS SELECCIONADAS: <u>{{ $f1 }}</u> y <u>{{ $f2 }}</u></h5>
                            </td>
                        </tr>
                    </table>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <a href="fechasequipo" class="btn btn-info btn-md active">VOLVER</a>
    </div>
</div>

@endsection