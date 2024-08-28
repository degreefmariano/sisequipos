@extends('layouts.admin')

@section('title', 'SGE')

@section('content')

<style type='text/css'>
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: LAVENDER;
    }
</style>

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" align="center" style="color: #800080; background-color: LAVENDER">
                <span><i class="fas fa-medkit"></i></span>
                TOTAL DE SERVICIOS: {{ $a }}
            </div>
        </div>
    </div>
    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <div class="panel panel-default">
            <div style="overflow:scroll;height:340px;width:100%;overflow:auto">
                <table class="table table-striped">
                    <tr style="background-color: POWDERBLUE">
                        <th width="9%">SERIE DIP</th>
                        <th width="12%">FECHA INGRESO</th>
                        <!--                             <th width="10%">TIPO</th>
                            <th width="15%">MARCA</th> -->
                        <th width="85%">MOTIVO INGRESO</th>
                        <th width="20%" style="text-align: right">OPCIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </th>
                    </tr>
                    @if($servicios->count())
                    @foreach($servicios as $servicio)
                    <tr>
                        <!--equipo-->
                        <td align="left" width="100">
                            {{ $servicio-> equipo }}
                        </td>
                        <!--unidad_destino-->
                      
                        <!--fecha_ingreso-->
                        <td align="justify" width="150">
                            <?php
                                            $originalDate = $servicio->fecha_ingreso;
                                            $newDate = date("d/m/Y", strtotime($originalDate));
                                        ?>
                            {{ $newDate }}
                        </td>
                        <!--motivo_ingreso-->
                        <td align="justify" width="500" style="text-transform:uppercase">
                            {{ $servicio -> motivo_ingreso }}
                        </td>
                        <!--Opciones-->
                        <td align="center">
                            <a style="font-size: 16px; color: green" title="VER SERVICIO"
                                class="btn btn-Default btn-xs active" role="button"
                                href="{{action('ServiciosController@show', $servicio->id)}}">
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
                                <h5 class="text-danger">NO HUBO INGRESO DE SERVICIOS ENTRE LAS FECHAS SELECCIONADAS: <u>{{ $f1 }}</u> y <u>{{ $f2 }}</u></h5>
                            </td>
                        </tr>
                    </table>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <a href="fechasservicio" class="btn btn-info btn-md active">VOLVER</a>
    </div>
</div>

@endsection