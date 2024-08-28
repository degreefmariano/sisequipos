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
            <div class="panel-heading" align="center" style="color: #5b5f16; background-color: LAVENDER">
                <span><i class="fas fa-chart-bar"></i></span>
                ESTADISTICAS
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <br>
        <?php $originalDesde = $desde; $newDesde = date("d/m/Y", strtotime($originalDesde)); ?>
        <?php $originalHasta = $hasta; $newHasta = date("d/m/Y", strtotime($originalHasta)); ?>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 100px">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                <h5>SE GENERARON <u>{{ $total }}</u> SERVICIOS ENTRE LAS FECHAS <u>{{ $newDesde }}</u> Y <u>{{ $newHasta }}</h5>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
            <a class="btn btn-danger btn-md active" ; href="{{action('ServiciosController@estadisticasenPdf', ['total' => $total, 'newDesde' => $newDesde, 'newHasta' => $newHasta])}}"
                target="_blank" title="REPORTE DEL EQUIPO ENTREGADO">
                IMPRIMIR
            </a>
            <a href="estadisticas" class="btn btn-info btn-md active">
                VOLVER
            </a>
        </div>

@endsection