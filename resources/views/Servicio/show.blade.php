@extends('layouts.admin')

@section('content')

<style type='text/css'>
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #e5e5e5;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0 col-xs-20">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Revise los campos obligatorios.<br><br>
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
                <!--EQUIPO-->
                <div class="panel-heading" align="center" style="color: #8B4513; background-color: LIGHTGRAY">
                    <span><i class="fas fa-laptop-code"></i></span>
                    DATOS DEL EQUIPO
                </div>


                <!--EQUIPO-->
                <br>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" id="cm">
                        <p>SERIE DIP</p>
                        <p>{{ $servicios->aequipo->id }}</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                        <p>SERIE ANTERIOR</p>
                        {{ $servicios->aequipo->serie_equipo_anterior }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                        <p>FECHA INGRESO</p>
                        <?php
                                        $originalDate = $servicios->aequipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                        {{ $newDate }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                        <p>TIPO</p>
                        {{ $servicios->aequipo->tipo }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                        <p>MARCA</p>
                        {{ $servicios->aequipo->marca }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                        <p>PERSONAL DIP</p>
                        <span style="text-transform: uppercase">{{ $servicios->aequipo->personal_dip }}</span>
                    </div>
                </div>

                <br><br><br><br>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                        <p>DEPENDENCIA</p>
                        {{ $servicios->aequipo->unidad_destino }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                        <p>SUBDEPENDENCIA</p>
                        {{ $servicios->aequipo->subunidad_destino }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                        <p>TELEFONO</p>
                        {{ $servicios->aequipo->telefono }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                        <p>IP DEL EQUIPO</p>
                        {{ $servicios->aequipo->ip }}
                    </div>
                </div>

                <br><br><br><br>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                        <p>OBSERVACIONES DEL EQUIPO</p>
                        {{ $servicios->aequipo->observaciones }}
                    </div>
                </div>

                <br><br><br>

                <!--SERVICIO-->
                <div class="panel-heading" align="center" style="color: #800080; font-family: roman;
                                    background-color: #ADD8E6">
                    <span><i class="fas fa-wrench"></i></span>
                    DATOS DEL SERVICIO DE ESTADO: {{ $servicios->estado_servicio }}
                </div>
                <br>

                <form method="POST" action="{{ route('servicio.show',$servicios->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <br>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>N° SERVICIO</p>
                            {{ $servicios->id }}
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>FECHA INGRESO</p>
                            <?php
                                        $originalDate = $servicios->fecha_ingreso;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                            {{ $newDate }}
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>PERSONAL QUE ENTREGA</p>
                            {{ $servicios->personal_entrega }}
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>PERSONAL DIP RECIBE</p>
                            <h5 style="text-transform: uppercase">{{ $servicios->personal_div_servicio }}</h5>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                            <p>ACCESORIOS</p>
                            <h5 style="text-transform: uppercase">{{ $servicios->accesorios }}</h5>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm" style="text-align: justify;">
                            <p>MOTIVO DE INGRESO</p>
                            <h5 style="text-transform: uppercase">{{ $servicios->motivo_ingreso }}</h5>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm" style="text-align: justify;">
                            <p>DETALLE DE REPARACIÓN</p>
                            <h5 style="text-transform: uppercase">{{ $servicios->detalle_reparacion }}</h5>
                        </div>
                    </div>

                    <br><br><br><br>

                    @if ( $servicios->estado_servicio == "INGRESADO" ||
                    $servicios->estado_servicio == "PARCIAL" ||
                    $servicios->estado_servicio == "ENTREGAR")
                    @else

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" id="cm">
                            <p>FECHA DEVOLUCIÓN</p>
                            <?php
                                            $originalDate = $servicios->fecha_devolucion;
                                            $newDate = date("d/m/Y", strtotime($originalDate));
                                        ?>
                            {{ $newDate }}
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" id="cm">
                            <p>PERSONAL QUE RETIRA</p>
                            {{ $servicios -> personal_retira }}
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" id="cm">
                            <p>OBSERVACIONES DEL SERVICIO</p>
                            {{ $servicios->observacion_retira }}
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" id="cm">
                            <p>PERSONAL DIP QUE ENTREGA EQUIPO</p>
                            <h5 style="text-transform: uppercase">{{ $servicios->personal_div_entrega }}</h5>
                        </div>
                    </div>
                    @endif

                    <br><br><br><br>


                    <input type="button" value="VOLVER" class="btn btn-info btn-md" onclick="history.back(-1)" />
                </form>
            </div>
        </div>
    </div>
</div>

@endsection