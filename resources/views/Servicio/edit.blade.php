@extends('layouts.admin')

@section('content')

<script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/scriptSelectorEmpleado.js') }}"></script>

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

            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif

            <!--.......................................................................................................-->
            <!--ESTADO: INGRESADO-->

            @if($servicio -> estado_servicio == "INGRESADO")

            @if (count($errors) > 0)
            <div class="alert alert-warning" style="font-family: arial; font-size: 16px; color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="color: white; background-color: #b30000">
                    <span><i class="fas fa-laptop-code"></i></span>
                    DATOS DEL EQUIPO - INGRESADO
                </div>

                <form method="POST" action="{{ route('servicio.update',$servicio->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <!--EQUIPO-->
                    <br>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" id="cm">
                            <p>SERIE DIP</p>
                            <p>{{ $servicio->aequipo->id }}</p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>SERIE ANTERIOR</p>
                            {{ $servicio->aequipo->serie_equipo_anterior }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>FECHA INGRESO</p>
                            <?php
                                        $originalDate = $servicio->aequipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                            {{ $newDate }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TIPO</p>
                            {{ $servicio->aequipo->tipo }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>MARCA</p>
                            {{ $servicio->aequipo->marca }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>PERSONAL DIP</p>
                            <span style="text-transform: uppercase">{{ $servicio->aequipo->personal_dip }}</span>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>DEPENDENCIA</p>
                            {{ $servicio->aequipo->unidad_destino }}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>SUBDEPENDENCIA</p>
                            {{ $servicio->aequipo->subunidad_destino }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TELEFONO</p>
                            {{ $servicio->aequipo->telefono }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>IP DEL EQUIPO</p>
                            {{ $servicio->aequipo->ip }}
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                            <p>OBSERVACIONES DEL EQUIPO</p>
                            {{ $servicio->aequipo->observaciones }}
                        </div>
                    </div>

                    <br><br><br>

                    <!--SERVICIO-->
                    <div class="panel-heading" align="center" style="color: #800080; font-family: roman;
                                    background-color: #ADD8E6">
                        <span><i class="fas fa-wrench"></i></span>
                        <b style="text-transform: uppercase">
                            SERVICIO INGRESADO POR: {{ $servicio->personal_div_servicio }}
                        </b>
                    </div>
                    <br>

                    <table class="table table-striped">
                        <tr>
                            <th>FECHA INGRESO</th>
                            <th>PERSONAL QUE ENTREGA</th>
                        </tr>
                        <!--equipo-->
                        <input type="text" name="equipo" hidden value="{{$servicio->equipo}}">
                        <tr>
                            <!--fecha_ingreso-->
                            <th width="150">
                                <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"
                                    value="{{ $servicio->fecha_ingreso }}"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <th width="550">
                                <!--personal_entrega-->
                                <input type="text" name="personal_entrega" id="personal_entrega" class="form-control"
                                    readonly value="{{$servicio->personal_entrega}}" required>
                            </th>

                            <!--personal_div_servicio-->
                            <input type="text" name="personal_div_servicio" hidden value="{{ Auth::user()->name }}">
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <tr>
                            <th>ACCESORIOS</th>
                        </tr>
                        <tr>
                            <!--accesorios-->
                            <th width="500">
                                <input style="text-transform:uppercase;" class="form-control" type="text"
                                    name="accesorios" size="75" maxlength="90" value="{{$servicio->accesorios}}"
                                    required>
                            </th>
                        </tr>
                    </table>

                    <!--motivo_ingreso-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">MOTIVO DE INGRESO</th>
                        </tr>
                        <tr>
                            <th>
                                <textarea style="text-transform:uppercase;" class="form-control" rows="5"
                                    maxlength="250" name="motivo_ingreso"
                                    required>{{$servicio->motivo_ingreso}}</textarea>
                            </th>
                        </tr>
                    </table>

                    <!--detalle_reparacion-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">DESCRIPCION DE LA FALLA
                                <a href="{{url('ayuda')}}" target="_blank"
                                    title="SUGERENCIAS PARA LA FICHA TECNICA" style="background-color: #e5e5e5">
                                    (sugerencias)
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <textarea 
                                    style="text-transform:uppercase; background-color: white; text-align: justify" class="form-control"
                                    rows="5" maxlength="680" name="detalle_reparacion"
                                    value="{{$servicio->detalle_reparacion}}"
                                    placeholder="COMPLETAR POR LOS TECNICOS...">{{$servicio->detalle_reparacion}}</textarea>
                            </th>
                        </tr>
                        <!--fecha_devolucion-->
                        <input type="date" id="fecha_devolucion" name="fecha_devolucion" hidden
                            value="{{ $servicio->fecha_devolucion }}"
                            max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>">
                        <!--personal_retira-->
                        <input type="text" name="personal_retira" hidden value="{{$servicio->personal_retira}}">

                        <!--observacion_retira-->
                        <input type="text" name="observacion_retira" hidden value="{{$servicio->observacion_retira}}"
                            maxlength="280">
                    </table>



                    <!--estado_servicio-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">ESTADO DEL SERVICIO</th>
                        </tr>
                        <tr>
                            <th>
                                <form>
                                    <label style="color: red; background-color: #e5e5e5" class="radio-inline">
                                        <input class="custom-control-input" type="radio" name="estado_servicio"
                                            value="INGRESADO" required>
                                        <p style="font-size: 16px">
                                            EDITAR</p>
                                    </label>
                                    <label style="color: orange; background-color: #e5e5e5" class="radio-inline">
                                        <input class="custom-control-input" type="radio" name="estado_servicio"
                                            value="PARCIAL" required>
                                        <p style="font-size: 16px">
                                            PARCIAL</p>
                                    </label>
                                    <label style="color: green; background-color: #e5e5e5" class="radio-inline">
                                        <input class="custom-control-input" type="radio" name="estado_servicio"
                                            value="ENTREGAR" required>
                                        <p style="font-size: 16px">
                                            ENTREGAR</p>
                                    </label>
                                </form>
                            </th>
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-primary btn-md">CONTINUAR</button>
                    <a href="{{ route('servicio.index') }}" class="btn btn-info btn-md">VOLVER</a>

                </form>
            </div>
            @else

            <!--.......................................................................................................-->
            <!--ESTADO: PARCIAL-->

            @if($servicio -> estado_servicio == "PARCIAL")

            @if (count($errors) > 0)
            <div class="alert alert-warning" style="font-family: arial; font-size: 16px; color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="color: white; background-color: #e68a00">
                    <span><i class="fas fa-laptop-code"></i></span>
                    DATOS DEL EQUIPO - PARCIAL
                </div>

                <form method="POST" action="{{ route('servicio.update',$servicio->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <!--EQUIPO-->
                    <br>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" id="cm">
                            <p>SERIE DIP</p>
                            <p>{{ $servicio->aequipo->id }}</p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>SERIE ANTERIOR</p>
                            {{ $servicio->aequipo->serie_equipo_anterior }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>FECHA INGRESO</p>
                            <?php
                                        $originalDate = $servicio->aequipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                            {{ $newDate }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TIPO</p>
                            {{ $servicio->aequipo->tipo }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>MARCA</p>
                            {{ $servicio->aequipo->marca }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>PERSONAL DIP</p>
                            <span style="text-transform: uppercase">{{ $servicio->aequipo->personal_dip }}</span>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>DEPENDENCIA</p>
                            {{ $servicio->aequipo->unidad_destino }}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>SUBDEPENDENCIA</p>
                            {{ $servicio->aequipo->subunidad_destino }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TELEFONO</p>
                            {{ $servicio->aequipo->telefono }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>IP DEL EQUIPO</p>
                            {{ $servicio->aequipo->ip }}
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                            <p>OBSERVACIONES DEL EQUIPO</p>
                            {{ $servicio->aequipo->observaciones }}
                        </div>
                    </div>

                    <br><br><br>


                    <div class="panel-heading" align="center" style="color: #800080; font-family: roman;
                                    background-color: #ADD8E6">
                        <span><i class="fas fa-wrench"></i></span>
                        SERVICIO
                    </div>
                    <br>
                    <!--SERVICIO-->

                    <table class="table table-striped">
                        <tr>
                            <th>FECHA INGRESO</th>
                            <th>PERSONAL QUE ENTREGA</th>
                        </tr>
                        <!--equipo-->
                        <input type="text" name="equipo" hidden value="{{$servicio->equipo}}">
                        <tr>
                            <!--fecha_ingreso-->
                            <th width="150">
                                <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"
                                    value="{{ $servicio->fecha_ingreso }}"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <th width="550">
                                <!--personal_entrega-->
                                <input type="text" name="personal_entrega" id="personal_entrega" class="form-control"
                                    readonly value="{{$servicio->personal_entrega}}" required>
                            </th>

                            <!--personal_div_servicio-->
                            <input type="text" name="personal_div_servicio" hidden value="{{ Auth::user()->name }}">
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <tr>
                            <th>ACCESORIOS</th>
                        </tr>
                        <tr>
                            <!--accesorios-->
                            <th width="500">
                                <input style="text-transform:uppercase" class="form-control" type="text"
                                    name="accesorios" size="75" maxlength="90" value="{{$servicio->accesorios}}"
                                    required>
                            </th>
                        </tr>
                    </table>

                    <!--motivo_ingreso-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">MOTIVO DE INGRESO</th>
                        </tr>
                        <tr>
                            <th>
                                <textarea style="text-transform:uppercase" class="form-control" rows="5" maxlength="250"
                                    name="motivo_ingreso" required>{{$servicio->motivo_ingreso}}</textarea>
                            </th>
                        </tr>
                    </table>

                    <!--detalle_reparacion-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">DESCRIPCION DE LA FALLA
                                <a href="{{url('ayuda')}}" target="_blank"
                                    title="SUGERENCIAS PARA LA FICHA TECNICA" style="background-color: #e5e5e5">
                                    (sugerencias)
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <textarea 
                                style="text-transform:uppercase; background-color: white; text-align: justify" class="form-control"
                                    rows="5" maxlength="680" name="detalle_reparacion"
                                    value="{{$servicio->detalle_reparacion}}">{{$servicio->detalle_reparacion}}</textarea>
                            </th>
                        </tr>
                        <!--fecha_devolucion-->
                        <input type="date" id="fecha_devolucion" name="fecha_devolucion" hidden
                            value="{{ $servicio->fecha_devolucion }}"
                            max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>">
                        <!--personal_retira-->
                        <input type="text" name="personal_retira" hidden value="{{$servicio->personal_retira}}">

                        <!--observacion_retira-->
                        <input type="text" name="observacion_retira" hidden value="{{$servicio->observacion_retira}}"
                            maxlength="280">
                    </table>

                    <!--estado_servicio-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">ESTADO DEL SERVICIO</th>
                        </tr>
                        <tr>
                            <th>
                                <form>
                                    <label style="color: orange; background-color: #e5e5e5" class="radio-inline">
                                        <input class="custom-control-input" type="radio" name="estado_servicio"
                                            value="PARCIAL" required>
                                        <p style="font-size: 16px">
                                            PARCIAL</p>
                                    </label>
                                    <label style="color: green; background-color: #e5e5e5" class="radio-inline">
                                        <input class="custom-control-input" type="radio" name="estado_servicio"
                                            value="ENTREGAR" required>
                                        <p style="font-size: 16px">
                                            ENTREGAR</p>
                                    </label>
                                </form>
                            </th>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-md">CONTINUAR</button>
                    <a href="{{ route('servicio.index') }}" class="btn btn-info btn-md">VOLVER</a>
                </form>
            </div>
            @else

            <!--.......................................................................................................-->
            <!--ESTADO: ENTREGAR-->

            @if($servicio -> estado_servicio == "ENTREGAR")

            @if (count($errors) > 0)
            <div class="alert alert-warning" style="font-family: arial; font-size: 16px; color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="color: white; background-color: #009900">
                    <span><i class="fas fa-laptop-code"></i></span>
                    DATOS DEL EQUIPO - ENTREGAR
                </div>

                <form method="POST" action="{{ route('servicio.update',$servicio->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <!--EQUIPO-->
                    <br>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" id="cm">
                            <p>SERIE DIP</p>
                            <p>{{ $servicio->aequipo->id }}</p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>SERIE ANTERIOR</p>
                            {{ $servicio->aequipo->serie_equipo_anterior }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>FECHA INGRESO</p>
                            <?php
                                        $originalDate = $servicio->aequipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                            {{ $newDate }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TIPO</p>
                            {{ $servicio->aequipo->tipo }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>MARCA</p>
                            {{ $servicio->aequipo->marca }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>PERSONAL DIP</p>
                            <span style="text-transform: uppercase">{{ $servicio->aequipo->personal_dip }}</span>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>DEPENDENCIA</p>
                            {{ $servicio->aequipo->unidad_destino }}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>SUBDEPENDENCIA</p>
                            {{ $servicio->aequipo->subunidad_destino }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TELEFONO</p>
                            {{ $servicio->aequipo->telefono }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>IP DEL EQUIPO</p>
                            {{ $servicio->aequipo->ip }}
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                            <p>OBSERVACIONES DEL EQUIPO</p>
                            {{ $servicio->aequipo->observaciones }}
                        </div>
                    </div>

                    <br><br><br>


                    <div class="panel-heading" align="center" style="color: #800080; font-family: roman;
                                    background-color: #ADD8E6">
                        <span><i class="fas fa-wrench"></i></span>
                        SERVICIO
                    </div>
                    <br>
                    <!--SERVICIO-->
                    <table class="table table-striped">
                        <tr>
                            <th>FECHA INGRESO</th>
                            <th>PERSONAL QUE ENTREGA</th>
                        </tr>
                        <!--equipo-->
                        <input type="text" name="equipo" hidden value="{{$servicio->equipo}}">
                        <tr>
                            <!--fecha_ingreso-->
                            <th width="150">
                                <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"
                                    value="{{ $servicio->fecha_ingreso }}"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <th width="550">
                                <!--personal_entrega-->
                                <input type="text" name="personal_entrega" id="personal_entrega" class="form-control"
                                    readonly value="{{$servicio->personal_entrega}}" required>
                            </th>

                            <!--personal_div_servicio-->
                            <input type="text" name="personal_div_servicio" hidden
                                value="{{$servicio->personal_div_servicio}}">
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <tr>
                            <th>ACCESORIOS</th>
                        </tr>
                        <tr>
                            <!--accesorios-->
                            <th width="500">
                                <input style="text-transform:uppercase" class="form-control" type="text"
                                    name="accesorios" size="75" maxlength="90" value="{{$servicio->accesorios}}"
                                    required>
                            </th>
                        </tr>
                    </table>

                    <!--motivo_ingreso-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">MOTIVO DE INGRESO</th>
                        </tr>
                        <tr>
                            <th>
                                <textarea 
                                    style="text-transform:uppercase" class="form-control" rows="5" maxlength="250"
                                    name="motivo_ingreso" required>{{$servicio->motivo_ingreso}}</textarea>
                            </th>
                        </tr>
                    </table>

                    <!--detalle_reparacion-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">DESCRIPCION DE LA FALLA
                                <a href="{{url('ayuda')}}" target="_blank"
                                    title="SUGERENCIAS PARA LA FICHA TECNICA" style="background-color: #e5e5e5">
                                    (sugerencias)
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <textarea
                                style="text-transform:uppercase; background-color: white; text-align: justify" class="form-control"
                                    rows="5" maxlength="680" name="detalle_reparacion"
                                    value="{{$servicio->detalle_reparacion}}"
                                    required>{{ $servicio->detalle_reparacion }}</textarea>
                            </th>
                        </tr>

                    </table>

                    <!--DEVOLUCION-->
                    <div class="panel-heading" align="center" style="color: white; background-color: gray">
                        <span><i class="fas fa-wrench"></i></span>
                        DATOS DE LA DEVOLUCION
                    </div>

                    <br>

                    <table class="table table-striped">
                        <tr>
                            <th>FECHA DEVOLUCION</th>
                            <th>PERSONAL QUE RETIRA</th>
                            <th>
                                <!--ACA VA EL BOTON-->
                            </th>
                            <th>APELLIDO Y NOMBRE</th>
                        </tr>
                        <tr>
                            <!--fecha_devolucion-->
                            <th width="150">
                                <input type="date" id="fecha_devolucion" name="fecha_devolucion" class="form-control"
                                    value="<?php echo date("Y-m-d");?>"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>

                            <th width="150">
                                <!--legajoDev-->
                                <input type="number" name="legajoDev" id="legajoDev" class="form-control" maxlength="6"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    placeholder="INGRESE LEGAJO..." required>
                            </th>
                            <th width="10">
                                <!--buscar-->
                                <button type="submit" name="buscar" id="buscar" onclick="cargarDev()"
                                    style="background-color: #f2f2f2; font-size: 18px">
                                    <i style="background-color: #f2f2f2; color: #663399" class="fas fa-search-plus"></i>
                                </button>
                            </th>
                            <th width="550">
                                <!--personal_retira-->
                                <input type="text" name="personal_retira" id="personal_retira" class="form-control"
                                    readonly required>
                            </th>
                            <!--personal_div_entrega-->
                            <input type="text" name="personal_div_entrega" hidden value="{{ Auth::user()->name }}"
                                maxlength="280">
                        </tr>
                    </table>

                    <!--observacion_retira-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">OBSERVACIONES DEL SERVICIO</th>
                        </tr>
                        <tr>
                            <th>
                                <textarea style="text-transform:uppercase; background-color: white" class="form-control"
                                    rows="5" maxlength="280" name="observacion_retira"
                                    value="SIN OBSERVACIONES">SIN OBSERVACIONES</textarea>
                            </th>
                        </tr>
                    </table>

                    <!--estado_servicio-->
                    <table class="table table-striped">
                        <tr>
                            <th class="text-left">ESTADO DEL SERVICIO</th>
                        </tr>
                        <tr>
                            <th>
                                <form>
                                    <label style="color: #3399ff; background-color: #e5e5e5" class="radio-inline">
                                        <input class="custom-control-input" type="radio" name="estado_servicio"
                                            value="ENTREGADO" required>
                                        <p style="font-size: 16px">ENTREGADO
                                    </label>
                                </form>
                            </th>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-md">CONTINUAR</button>
                    <a href="{{ route('servicio.index') }}" class="btn btn-info btn-md">VOLVER</a>
                </form>

                @else
                <!--ESTADO: ENTREGADO-->

                @if (count($errors) > 0)
                <div class="alert alert-warning" style="font-family: arial; font-size: 16px; color: red">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading" align="center" style="color: white; background-color: #2E63A3">
                        <span><i class="fas fa-laptop-code"></i></span>
                        DATOS DEL EQUIPO - ENTREGADO
                    </div>

                    <form method="POST" action="{{ route('servicio.update',$servicio->id) }}" role="form">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">

                        <!--EQUIPO-->
                        <br>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" id="cm">
                                <p>SERIE DIP</p>
                                <p>{{ $servicio->aequipo->id }}</p>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                                <p>SERIE ANTERIOR</p>
                                {{ $servicio->aequipo->serie_equipo_anterior }}
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                                <p>FECHA INGRESO</p>
                                <?php
                                        $originalDate = $servicio->aequipo->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                                {{ $newDate }}
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                                <p>TIPO</p>
                                {{ $servicio->aequipo->tipo }}
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                                <p>MARCA</p>
                                {{ $servicio->aequipo->marca }}
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                                <p>PERSONAL DIP</p>
                                <span style="text-transform: uppercase">{{ $servicio->aequipo->personal_dip }}</span>
                            </div>
                        </div>

                        <br><br><br><br>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                                <p>DEPENDENCIA</p>
                                {{ $servicio->aequipo->unidad_destino }}
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                                <p>SUBDEPENDENCIA</p>
                                {{ $servicio->aequipo->subunidad_destino }}
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                                <p>TELEFONO</p>
                                {{ $servicio->aequipo->telefono }}
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                                <p>IP DEL EQUIPO</p>
                                {{ $servicio->aequipo->ip }}
                            </div>
                        </div>

                        <br><br><br><br>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                                <p>OBSERVACIONES DEL EQUIPO</p>
                                {{ $servicio->aequipo->observaciones }}
                            </div>
                        </div>

                        <br><br><br>


                        <div class="panel-heading" align="center" style="color: #800080; font-family: roman;
                                    background-color: #ADD8E6">
                            <span><i class="fas fa-wrench"></i></span>
                            <b style="text-transform: uppercase">
                                <b>SERVICIO ENTREGADO POR: {{ $servicio->personal_div_servicio }}</b>
                            </b>
                        </div>
                        <br>
                        <!--SERVICIO-->
                        <table class="table table-striped">
                            <tr>
                                <th>FECHA INGRESO</th>
                                <th>PERSONAL QUE ENTREGA</th>
                            </tr>
                            <!--equipo-->
                            <input type="text" name="equipo" hidden value="{{$servicio->equipo}}">
                            <tr>
                                <!--fecha_ingreso-->
                                <th width="150">
                                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"
                                        value="{{ $servicio->fecha_ingreso }}"
                                        max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                                </th>
                                <th width="550">
                                    <!--personal_entrega-->
                                    <input type="text" name="personal_entrega" id="personal_entrega"
                                        class="form-control" readonly value="{{$servicio->personal_entrega}}" required>
                                </th>

                                <!--personal_div_servicio-->
                                <input type="text" name="personal_div_servicio" hidden
                                    value="{{$servicio->personal_div_servicio}}">
                            </tr>
                        </table>

                        <table class="table table-striped">
                            <tr>
                                <th>ACCESORIOS</th>
                            </tr>
                            <tr>
                                <!--accesorios-->
                                <th width="500">
                                    <input style="text-transform:uppercase" class="form-control" type="text"
                                        name="accesorios" size="75" maxlength="90" value="{{$servicio->accesorios}}"
                                        required>
                                </th>
                            </tr>
                        </table>

                        <!--motivo_ingreso-->
                        <table class="table table-striped">
                            <tr>
                                <th class="text-left">MOTIVO DE INGRESO</th>
                            </tr>
                            <tr>
                                <th>
                                    <textarea style="text-transform:uppercase" class="form-control" rows="5"
                                        maxlength="250" name="motivo_ingreso"
                                        required>{{$servicio->motivo_ingreso}}</textarea>
                                </th>
                            </tr>
                        </table>

                        <!--detalle_reparacion-->
                        <table class="table table-striped">
                            <tr>
                                <th class="text-left">DESCRIPCION DE LA FALLA
                                    <a href="{{url('ayuda')}}" target="_blank"
                                        title="SUGERENCIAS PARA LA FICHA TECNICA" style="background-color: #e5e5e5">
                                        (sugerencias)
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <textarea
                                    style="text-transform:uppercase; background-color: white; text-align: justify" class="form-control"
                                        class="form-control" rows="5" maxlength="680" name="detalle_reparacion"
                                        value="{{$servicio->detalle_reparacion}}"
                                        required>{{ $servicio->detalle_reparacion }}</textarea>
                                </th>
                            </tr>

                        </table>

                        <!--DEVOLUCION-->
                        <div class="panel-heading" align="center" style="color: white; background-color: gray">
                            <span><i class="fas fa-wrench"></i></span>
                            DATOS DE LA DEVOLUCION
                        </div>

                        <br>

                        <table class="table table-striped">
                            <tr>
                                <th>FECHA DEVOLUCION</th>
                                <th>PERSONAL QUE RETIRA</th>
                                <th>
                                    <!--ACA VA EL BOTON-->
                                </th>
                                <th>APELLIDO Y NOMBRE</th>
                            </tr>
                            <tr>
                                <!--fecha_devolucion-->
                                <th width="150">
                                    <input type="date" id="fecha_devolucion" name="fecha_devolucion"
                                        class="form-control" value="<?php echo date("Y-m-d");?>"
                                        max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                                </th>

                                <th width="150">
                                    <!--legajoDev-->
                                    <input type="number" name="legajoDev" id="legajoDev" class="form-control"
                                        maxlength="6"
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        placeholder="INGRESE LEGAJO..." required>
                                </th>
                                <th width="10">
                                    <!--buscar-->
                                    <button type="submit" name="buscar" id="buscar" onclick="cargarDev()"
                                        style="background-color: #f2f2f2; font-size: 18px">
                                        <i style="background-color: #f2f2f2; color: #663399"
                                            class="fas fa-search-plus"></i>
                                    </button>
                                </th>
                                <th width="550">
                                    <!--personal_retira-->
                                    <input type="text" name="personal_retira" id="personal_retira" class="form-control"
                                        readonly required value="{{ $servicio->personal_retira }}">
                                </th>
                                <!--personal_div_entrega-->
                                <input type="text" name="personal_div_entrega" hidden value="{{ Auth::user()->name }}"
                                    maxlength="280">
                            </tr>
                        </table>

                        <!--observacion_retira-->
                        <table class="table table-striped">
                            <tr>
                                <th class="text-left">OBSERVACIONES DEL SERVICIO</th>
                            </tr>
                            <tr>
                                <th>
                                    <textarea style="text-transform:uppercase; background-color: white"
                                        class="form-control" rows="5" maxlength="280" name="observacion_retira"
                                        value="SIN OBSERVACIONES">SIN OBSERVACIONES</textarea>
                                </th>
                            </tr>
                        </table>

                        <!--estado_servicio-->
                        <table class="table table-striped">
                            <tr>
                                <th class="text-left">ESTADO DEL SERVICIO</th>
                            </tr>
                            <tr>
                                <th>
                                    <form>
                                        <label style="color: #3399ff; background-color: #e5e5e5" class="radio-inline">
                                            <input class="custom-control-input" type="radio" name="estado_servicio"
                                                value="ENTREGADO" required>
                                            <p style="font-size: 16px; color: red">EDITAR
                                        </label>
                                    </form>
                                </th>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary btn-md">CONTINUAR</button>
                        <a href="{{ route('servicio.index') }}" class="btn btn-info btn-md">VOLVER</a>
                    </form>
                    <!--.......................................................................................................-->
                    @endif
                    <!--este endif cierra ESTADO: INGRESADO-->
                    @endif
                    <!--este endif cierra ESTADO: PARCIAL-->
                    @endif
                    <!--este endif cierra ESTADO: ENTREGAR-->
                </div>
            </div>
        </div>
    </div>

    @endsection