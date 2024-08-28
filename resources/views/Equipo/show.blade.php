@extends('layouts.admin')

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
            <!--DATOS DEL EQUIPO-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" align="center" style="color: #8B4513; background-color: LIGHTGRAY">
                        <span><i class="fas fa-laptop-code"></i></span>
                        DATOS DEL EQUIPO
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('equipo.show',$equipos->id) }}" role="form">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                        <p>SERIE DIP</p>
                        <p>{{ $equipos  -> id }}</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <p>SERIE ANTERIOR</p>
                        {{ $equipos  -> serie_equipo_anterior }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <p>FECHA INGRESO</p>
                        <?php
                                $originalDate = $equipos->fecha_alta;
                                $newDate = date("d/m/Y", strtotime($originalDate));
                            ?>
                        {{ $newDate }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <p>TIPO</p>
                        {{ $equipos  -> tipo }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <p>MARCA</p>
                        {{ $equipos  -> marca }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <p>PERSONAL DIP</p>
                        <span style="text-transform: uppercase">{{ $equipos  -> personal_dip }}</span>
                    </div>
                </div>

                <br><br><br><br><br><br><br>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <p>DEPENDENCIA</p>
                        {{ $equipos  -> unidad_destino }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <p>SUBDEPENDENCIA</p>
                        {{ $equipos->subunidad_destino }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <p>TELEFONO</p>
                        {{ $equipos  -> telefono }}
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <p>IP DEL EQUIPO</p>
                        {{ $equipos  -> ip }}
                    </div>
                </div>

                <br><br><br><br>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p>OBSERVACIONES DEL EQUIPO</p>
                        {{ $equipos  -> observaciones }}
                    </div>
                </div>

                <br><br><br><br>

                <!--DATOS DEL SERVICIO-->
                <div class="panel panel-default">
                    <div class="panel-heading" align="center" style="color: #800080">
                        <span><i class="fas fa-medkit"></i></span>
                        DATOS DEL SERVICIO
                    </div>
                </div>


                @if ($total > 0)
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #A9D0F5">
                        <strong>
                            SERVICIOS DEL EQUIPO ENCONTRADOS: {{ " ( ". $total ." ) " }}
                        </strong>
                    </div>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th width="15%">N° DE SERVICIO</th>
                        <th width="15%">FECHA INGRESO</th>
                        <th width="49%">DETALLE REPARACIÓN</th>
                        <th width="18%">FECHA DEVOLUCIÓN</th>
                        <th width="7%">OPCION</th>
                    </tr>

                    @foreach($servicios as $serv)

                    <tr style="color: #800080">
                        <!--id-->
                        <td>{{ $serv -> id }}</td>
                        <!--fecha_ingreso-->
                        <td>
                            <?php
                                            $originalDate = $serv->fecha_ingreso;
                                            $newDate = date("d/m/Y", strtotime($originalDate));
                                        ?>
                            {{ $newDate }}
                        </td>
                        <!--detalle_reparacion-->
                        <td class="arreglotexto">{{ $serv -> detalle_reparacion }}</td>
                        <!--fecha_devolucion-->
                        <td>
                            <?php
                                            $originalDate = $serv->fecha_devolucion;
                                            $newDate = date("d/m/Y", strtotime($originalDate));
                                        ?>
                            {{ $newDate }}
                        </td>
                        <td>
                            <a class="btn btn-Default btn-xs active" role="button"
                                href="{{action('ServiciosController@show', $serv->id)}}" title="VER SERVICIO">
                                <span><i style="font-size: 18px" class="fas fa-eye"></i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                @else
                <div class="panel panel-default">
                    <div class="panel-heading" align="center" style="color: red">
                        <strong>
                            EL EQUIPO NO REGISTRA SERVICIOS
                        </strong>
                    </div>
                </div>
                @endif

                <!--lg md sm xs -->
                <input type="button" value="VOLVER" class="btn btn-info btn-md" onclick="history.back(-1)" />
            </form>

        </div>
    </div>
</div>

@endsection