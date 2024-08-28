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


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" align="center" style="color: #8B4513; background-color: LIGHTGRAY">
                        <span><i class="fas fa-laptop-code"></i></span>
                        EDITAR EQUIPO...
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <form method="POST" action="{{ route('equipo.update',$equipo->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <table class="table table-striped">
                        <tr>
                            <th>SERIE DIP</th>
                            <th>SERIE ANTERIOR</th>
                            <th>FECHA INGRESO</th>
                            <th>TIPO</th>
                            <th>MARCA</th>
                        </tr>
                        <tr>
                            <!--id-->
                            <th width="150" style="font-size: 17px">
                                {{ $equipo->id }}
                            </th>
                            <!--serie_equipo_anterior-->
                            <th width="300">
                                <input type="text" class="form-control" name="serie_equipo_anterior"
                                    id="serie_equipo_anterior" maxlength="20" value="{{$equipo->serie_equipo_anterior}}"
                                    required>
                            </th>
                            <!--fecha_alta-->
                            <th>
                                <input type="date" id="fecha_alta" name="fecha_alta" class="form-control"
                                    value="{{ $equipo->fecha_alta }}"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <!--tipo-->
                            <th width="250">
                                <div class="threecol">
                                    <select name="tipo" id="tipo" class="selectpicker form-control"
                                        data-live-search="true" required>
                                        <option value="{{$equipo->tipo}}" selected>{{$equipo->tipo}}</option>
                                        <option value="ALL IN ONE"> ALL IN ONE </option>
                                        <option value=CPU> CPU </option>
                                        <option value=ESCANER> ESCANER </option>
                                        <option value=ESTABILIZADOR> ESTABILIZADOR </option>
                                        <option value=IMPRESORA> IMPRESORA </option>
                                        <option value=MATERIALES> MATERIALES </option>
                                        <option value=MONITOR> MONITOR </option>
                                        <option value=MOUSE> MOUSE </option>
                                        <option value=NETBOOK> NETBOOK </option>
                                        <option value=NOTEBOOK> NOTEBOOK </option>
                                        <option value=REPUESTOS> REPUESTOS </option>
                                        <option value=SWITCH> SWITCH </option>
                                        <option value=OTROS> OTROS </option>
                                    </select>
                                </div>
                            </th>
                            <!--marca-->
                            <th width="250">
                                <div class="threecol">
                                    <select name="marca" id="marca" class="selectpicker form-control"
                                        data-live-search="true" required>
                                        <option value="{{$equipo->marca}}" selected>{{$equipo->marca}}
                                        </option>
                                        <option value="ASUS"> ASUS </option>
                                        <option value="BANGHO"> BANGHO </option>
                                        <option value="BROTHER"> BROTHER </option>
                                        <option value="CANON"> CANON </option>
                                        <option value="CLON"> CLON </option>
                                        <option value="COMPAQ PRESARIO"> COMPAQ PRESARIO </option>
                                        <option value="CX"> CX </option>
                                        <option value="DATAVISION"> DATAVISION </option>
                                        <option value="DELL"> DELL </option>
                                        <option value="EPSON"> EPSON </option>
                                        <option value="HP"> HP </option>
                                        <option value="HYPER"> HYPER </option>
                                        <option value="INTX"> INTX </option>
                                        <option value="LENOVO"> LENOVO </option>
                                        <option value="LEVEN"> LEVEN </option>
                                        <option value="MUSTIFF"> MUSTIFF </option>
                                        <option value="NETSYS"> NETSYS </option>
                                        <option value="NOGANET"> NOGANET </option>
                                        <option value="OCEAN"> OCEAN </option>
                                        <option value="OVER CASE"> OVER CASE </option>
                                        <option value="PERFORMANCE"> PERFORMANCE </option>
                                        <option value="SAD9000"> SAD9000 </option>
                                        <option value="SAMSUNG"> SAMSUNG </option>
                                        <option value="SENTEY"> SENTEY </option>
                                        <option value="SOLTECH"> SOLTECH </option>
                                        <option value="TCL"> TCL </option>
                                        <option value="VECTRA"> VECTRA </option>
                                        <option value="VELOCITY"> VELOCITY </option>
                                        <option value="VITSUBA"> VITSUBA </option>
                                        <option value="XEROX 3260"> XEROX 3260 </option>
                                        <option value="OTROS"> OTROS </option>
                                    </select>
                                </div>
                            </th>
                            <!--personal_dip-->
                            <input type="text" name="personal_dip" id="personal_dip" size="20" hidden
                                value="{{ Auth::user()->name  }}">
                            <!--estado_equipo-->
                            <input type="text" name="estado_equipo" id="estado_equipo" size="20" hidden
                                value="{{$equipo->estado_equipo}}">
                        </tr>
                    </table>

                    <!--PONER ACA-->
                    <table class="table table-striped">
                        <tr>
                            <th>UNIDAD DE DESTINO</th>
                            <th>SUBUNIDAD DE DESTINO</th>
                            <th>TELEFONO</th>
                            <th>IP DEL EQUIPO</th>
                        </tr>
                        <!--unidad_destino-->
                        <tr>
                            <th width="250">
                                <div class="threecol">
                                    <select name="unidad_destino" id="unidad_destino" class="selectpicker form-control"
                                        data-live-search="true" required>
                                        <option value="{{$equipo->unidad_destino}}" selected>{{$equipo->unidad_destino}}
                                        </option>
                                        @foreach ($dependencias as $dependencia)
                                        <option value="{{$dependencia->nombre}}">
                                            {{ 
                                                        $dependencia->nombre
                                                    }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <!--subunidad_destino-->
                            <th width="300">
                                <input type="text" class="form-control" style="text-transform:uppercase"
                                    onkeyup="this.value=this.value.toUpperCase();" name="subunidad_destino"
                                    id="subunidad_destino" maxlength="20" value="{{$equipo->subunidad_destino}}"
                                    required>
                            </th>
                            <!--telefono-->
                            <th width="300">
                                <input type="text" class="form-control" name="telefono" id="telefono" size="20"
                                    maxlength="20" value="{{$equipo->telefono}}" required>
                            </th>
                            <!--ip-->
                            <th width="300">
                                <input type="text" class="form-control" name="ip" id="ip" size="20" maxlength="20"
                                    value="{{$equipo->ip}}">
                            </th>
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <tr>
                            <th>OBSERVACIONES DEL EQUIPO</th>
                        </tr>
                        <!--observaciones-->
                        <tr>
                            <th style="text-transform:uppercase" onkeyup="this.value=this.value.toUpperCase();">
                                <input type="text" style="text-transform:uppercase" class="form-control" size="120"
                                    maxlength="119" name="observaciones" id="observaciones" required
                                    value="{{$equipo->observaciones}}">
                            </th>
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-primary btn-md">EDITAR EQUIPO</button>
                    <input type="button" class="btn btn-info btn-md" value="VOLVER" onclick="history.back()">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection