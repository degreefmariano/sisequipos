@extends('layouts.admin')

@section('content')

<style type='text/css'>
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: LAVENDER;
    }

    .swal-title {
        margin: 0px;
        font-size: 17px;
        margin-bottom: 36px;
    }

    .swal-modal .swal-text {
        text-align: center;
    }

    .swal-footer {
        background-color: rgb(245, 248, 250);
        margin-top: 32px;
        border-top: 1px solid #E9EEF1;
        overflow: hidden;
    }
</style>

<!--Mensajes con sweetalert "error","warning","success","info -->
<script src="{{ asset('sweetalert/sweetalert.js') }}"></script>
@if (isset($exitoGuardado))
    <script type="text/javascript">
        swal("SERVICIO N° {{ $idservicio }} EN EQUIPO DE SERIE DIP: {{ $idequipo }}", "INGRESADO SATISFACTORIAMENTE",
            "success");
    </script>
@endif

<div class="container">
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
    <a href="route"></a>
    <!--success info warning danger-->
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong>{{Session::get('success')}}</strong>
        @if(Session::has('id'))
        <a class="btn btn-success btn-sm" ; href="{{action('ServiciosController@orderPdf', Session::get('id'))}}"
            target="_blank" title="REPORTE DEL EQUIPO ENTREGADO">
            <span class="glyphicon glyphicon-print" style="color: white"></span>&nbsp;&nbsp;
            IMPRIMIR ENTREGA
        </a>
        @endif
    </div>
    @endif

    {{csrf_field()}}

    <div class="row">
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7" style="color: #800080">
            <span><i class="fas fa-medkit"></i></span>
            SERVICIOS
            
            @if ($ingresado != 0)
                <button type="button" class="btn btn-danger btn-sm">
                    INGRESADO <span class="badge text-bg-secondary small">{{ $ingresado }}</span>
                </button>            
            @endif
            
            @if ($parcial != 0)
                <button type="button" class="btn btn-warning btn-sm">
                    PARCIAL <span class="badge text-bg-secondary small">{{ $parcial }}</span>
                </button>
            @endif

            @if ($entregar != 0)
                <button type="button" class="btn btn-success btn-sm">
                    ENTREGAR <span class="badge text-bg-secondary small">{{ $entregar }}</span>
                </button>
            @endif

            <button type="button" class="btn btn-info btn-xs">
                ULTIMO REGISTRO N° <span class="badge text-bg-secondary small">{{ $ultimoServicio->id }}</span>
            </button>

        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" align="right">
            <form>
                <div class="input-group input-group-md">
                    <div class="input-group">
                        <input style="text-transform:uppercase" size="30" onkeyup="this.value=this.value.toUpperCase();"
                            type="text" class="form-control" name="searchText" placeholder="SERIE DIP.../ESTADO..."
                            title="SERIE DIP.../ESTADO..."
                            value="{{$searchText}}">
                        <span class="input-group-addon" id="search" style="background-color: #e5e5e5">
                            <button class="btn btn-default btn-xs" style="background-color: #e5e5e5">
                                <span aria-hidden="true"><i class="fas fa-search"></i></span>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" align="right">
            <div class="input-group input-group-md">
		 <a href="{{url('fechasservicio')}}" class="btn btn-default btn-md active">
            FECHA INGRESO
                    <span><i class="fas fa-search"></i></span>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <table class="table table-striped">
            <tr style="background-color: #A48EC1">
                <th width="5%">N°</th>
                <th width="7%">SERIE DIP</th>
                <th width="10%">FECHA INGRESO</th>
                <th width="11%">TIPO</th>
                <th width="10%">MARCA</th>
                <th width="27%">MOTIVO INGRESO</th>
                <th width="20%" style="text-align: right">
                    OPCIONES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </th>
            </tr>
        </table>
    </div>

    @if($servicios->count())

    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <div class="panel panel-default">
            <div style="overflow:scroll;height:340px;width:100%;overflow:auto">
                <table class="table table-striped">
                    @foreach($servicios as $servicio)
                    <tr>
                        <!-- Id -->
                        <td width="6%">
                            @if ($servicio->id == $ultimoServicio->id)
                                {{ $servicio->id }}
                                <span style="color: #00aae4"><i class="fa fas-solid fa-arrow-left"></i></span>
                            @else 
                                {{ $servicio->id }} 
                            @endif 
                        </td>
                        <!--Serie DIP-->
                        <td width="8%">
                            {{ $servicio->aequipo->id }}
                        </td>
                        <!--fecha_ingreso-->
                        <td width="11%">
                            <?php $newDate = date("d/m/Y", strtotime($servicio->fecha_ingreso));?>{{ $newDate }}
                        </td>

                        <!--Tipo-->
                        <td width="12%">{{ $servicio->aequipo->tipo }}</td>
                        <!--Marca-->
                        <td width="11%">{{ $servicio->aequipo->marca }}</td>
                        <!--motivo_ingreso-->
                        <td width="32%" class="arreglotexto" align="justify" width="20%"
                            style="text-transform:uppercase">{{ $servicio->motivo_ingreso }}
                        </td>
                        <!--OPCIONES-->
                        <!--estado_servicio-->
                        <td width="20%" style="text-align: right">
                            @if($servicio -> estado_servicio == "INGRESADO")
                            <a class="btn btn-danger btn-xs active" role="button"
                                href="{{action('ServiciosController@edit', $servicio->id)}}"
                                title="El EQUIPO INGRESÓ A LA DIP Y TIENE UN SERVICIO">
                                {{ $servicio -> estado_servicio }}
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <!--VER-->
                            <a class="btn btn-Default btn-xs active" role="button"
                                href="{{action('ServiciosController@show', $servicio->id)}}" title="VER SERVICIO">
                                <span><i style="font-size: 18px" class="fas fa-eye"></i></span>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <!--PDF INGRESADO-->
                            <a class="btn btn-primary btn-sm" role="button"
                                href="{{action('ServiciosController@orderPdf', $servicio->id)}}" target="_blank"
                                title="REPORTE DEL EQUIPO INGRESADO">
                                <span class="glyphicon glyphicon-print"></span>
                            </a>
                            @else
                            @if($servicio -> estado_servicio == "PARCIAL")
                            <a class="btn btn-warning btn-xs active" role="button"
                                href="{{action('ServiciosController@edit', $servicio->id)}}"
                                title="El EQUIPO SE ENCUENTRA EN REPARACIÓN">
                                {{ $servicio -> estado_servicio }}
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <!--VER-->
                            <a class="btn btn-Default btn-xs active" role="button"
                                href="{{action('ServiciosController@show', $servicio->id)}}" title="VER SERVICIO">
                                <span><i style="font-size: 18px" class="fas fa-eye"></i></span>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <!--PDFficha-->
                            <a class="btn btn-primary btn-sm"
                                href="{{action('ServiciosController@orderPdf', $servicio->id)}}" target="_blank"
                                title="FICHA TÉCNICA">
                                <span class="glyphicon glyphicon-list-alt">
                                </span>
                            </a>
                            @else
                            @if($servicio -> estado_servicio == "ENTREGAR")
                            <a class="btn btn-success btn-xs active" role="button"
                                href="{{action('ServiciosController@edit', $servicio->id)}}"
                                title="EL EQUIPO SE ENCUENTRA A LA ESPERA PARA SER RETIRADO">
                                {{ $servicio -> estado_servicio }}
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <!--VER-->
                            <a class="btn btn-Default btn-xs active" role="button"
                                href="{{action('ServiciosController@show', $servicio->id)}}" title="VER SERVICIO">
                                <span><i style="font-size: 18px" class="fas fa-eye"></i></span>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <!--PDF-->
                            <a class="btn btn-primary btn-sm" style="background-color: #e5e5e5; border-color: #e5e5e5">
                                <span><i class="fa fa-check" aria-hidden="true"
                                        style="color: #e5e5e5; background-color: #e5e5e5"></i></span>
                            </a>
                            @else
                            @if($servicio -> estado_servicio == "ENTREGADO")
                            <!--EDITAR-->
                            @if (Auth::user()->name == $servicio->personal_div_servicio)
                            <a class="btn btn-primary btn-xs active" role="button"
                                href="{{action('ServiciosController@edit', $servicio->id)}}"
                                title="EL EQUIPO HA SIDO ENTREGADO Y SE PUEDE EDITAR">
                                {{ $servicio -> estado_servicio }}
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            @else
                            <a class="btn btn-primary disabled btn-xs active" role="button"
                                href="{{action('ServiciosController@edit', $servicio->id)}}"
                                title="EL EQUIPO HA SIDO ENTREGADO">
                                {{ $servicio -> estado_servicio }}
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            @endif

                            <!--VER-->
                            <a class="btn btn-Default btn-xs active" role="button"
                                href="{{action('ServiciosController@show', $servicio->id)}}" title="VER SERVICIO">
                                <span><i style="font-size: 18px" class="fas fa-eye"></i></span>
                            </a>

                            &nbsp;&nbsp;&nbsp;

                            <!--PDF-->
                            <a class="btn btn-primary btn-sm"
                                href="{{action('ServiciosController@orderPdf', $servicio->id)}}" target="_blank"
                                title="REPORTE DEL EQUIPO ENTREGADO">
                                <span class="glyphicon glyphicon-print" style="color: black"></span>
                            </a>
                            @else
                            <a class="btn btn-info btn-xs active" role="button"
                                href="{{action('ServiciosController@edit', $servicio->id)}}">
                                {{ $servicio -> estado_servicio }}
                            </a>
                            @endif
                            @endif
                            @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @else
    <table class="table table-striped">
        <tr style="background: #e5e5e5">
            <td>
                <p class="text-danger">SERVICIOS INEXISTENTES</p>
            </td>
        </tr>
    </table>
    @endif
    <em>Se muestran 20 registros por página {{ $servicios->links() }}</em>
</div>

@endsection