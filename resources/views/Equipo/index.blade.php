@extends('layouts.admin')

@section('content')

<style type='text/css'>
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #dbeddc;
    }

    .swal-title {
        margin: 0px;
        font-size: 20px;
        margin-bottom: 36px;
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
    swal("EQUIPO DE SERIE DIP: {{ $idequipo }}", "INGRESADO SATISFACTORIAMENTE", "success");
</script>
@endif

@if (isset($exitoGuardadoEdit))
<script type="text/javascript">
    swal("EQUIPO DE SERIE DIP: {{ $idequipo }}", "MODIFICADO SATISFACTORIAMENTE", "success");
</script>
@endif

@if (isset($errorGuardadoEdit))
<script type="text/javascript">
    swal("EQUIPO DE SERIE DIP: {{ $idequipo }}", "NO SE HA MODIFICADO", "info");
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
    <!--success info warning danger-->
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <h4>{{Session::get('success')}}</h4>
    </div>
    @endif

    {{csrf_field()}}

    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5" style="color: #8B4513">
            <span><i class="fas fa-laptop-code"></i></span>
            <b>EQUIPOS</b>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" align="right">
            <form>
                <div class="input-group input-group-md">
                    <div class="input-group">
                        <input style="text-transform:uppercase" size="30" onkeyup="this.value=this.value.toUpperCase();"
                            type="text" class="form-control" name="searchText" placeholder="SERIE DIP..."
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
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" align="right">
            <div class="input-group input-group-md">
                  <a href="{{url('fechasequipo')}}" class="btn btn-default btn-md active">
                    BUSCAR POR FECHA DE INGRESO
                    <span><i class="fas fa-search"></i></span></a>
            </div>
        </div>
    </div>
    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <table class="table table-striped">
            <tr style="background-color: #AB9994">
                <th width="7%">SERIE DIP</th>
                <th width="11%">FECHA INGRESO</th>
                <th width="10%">TIPO</th>
                <th width="14%">MARCA</th>
                <th width="33%">DEPENDENCIA</th>
                <th width="7%">TELEFONO</th>
                <th style="text-align: center;" colspan="4" width="15%">OPCIONES</th>
            </tr>
        </table>
    </div>

    @if($equipos->count())

    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <div class="panel panel-default">
            <div style="overflow:scroll;height:340px;width:100%;overflow:auto">
                <table class="table table-striped">
                    @foreach($equipos as $equipo)
                    <tr>
                        <!--id-->
                        <td width="8%">{{ $equipo -> id }}</td>
                        <!--fecha_alta-->
                        <td width="11%">
                            <?php
                                        $originalDate = $equipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                ?>
                            {{ $newDate }}
                        </td>
                        <!--tipo-->
                        <td width="10%">{{ $equipo -> tipo }}</td>
                        <!--marca-->
                        <td width="15%">{{ $equipo -> marca }}</td>
                        <!--unidad_destino-->
                        <td width="34%">{{ $equipo -> unidad_destino }}</td>
                        <!--telefono-->
                        <td width="8%">{{ $equipo -> telefono }}</td>
                        <!--VER-->
                        <td style="text-align: center">
                            <a style="font-size: 16px; color: #008080" title="VER EQUIPO"
                                class="btn btn-Default btn-xs active" role="button"
                                href="{{action('EquiposController@show', $equipo->id)}}">
                                <span><i style="font-size: 20px" class="fas fa-eye">
                                    </i></span>
                            </a>
                        </td>

                        <!--EDITAR-->
                        <td style="text-align: center">
                            <a style="font-size: 16px; color: #808000" title="EDITAR EQUIPO"
                                class="btn btn-Default btn-xs active" role="button"
                                href="{{action('EquiposController@edit', $equipo->id)}}">
                                <span><i style="font-size: 20px" class="fas fa-edit">
                                    </i></span>
                            </a>
                        </td>
                      
                        <td style="text-align: center">
                            <a style="font-size: 16px; color: #800080" title="INGRESAR SERVICIO"
                                class="btn btn-Default btn-xs active" role="button"
                                href="{{URL('nuevoServicio',$equipo->id)}}">
                                <span><i style="font-size: 20px" class="fas fa-wrench">
                                    </i></span>
                            </a>
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
                <p class="text-danger">EQUIPOS INEXISTENTES</p>
            </td>
        </tr>
    </table>
    @endif
    <em>Se muestran 20 registros por página {{ $equipos->links() }}</em>
</div>

@endsection