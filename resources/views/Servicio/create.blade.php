@extends('layouts.admin')

@section('content')

<script src="{{ asset('plugins/jquery/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/scriptSelectorEmpleado.js') }}"></script>

<style type='text/css'>
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #B0E0E6;
    }

    #cm {
        background-color: #dbeddc;
    }

    #cs {
        background-color: #800080;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-0 col-xs-20">

            <!--Mensajes con sweetalert "error","warning","success","info -->
            <script src="{{ asset('sweetalert/sweetalert.js') }}"></script>
            @if (isset($exitoGuardado))
            <script type="text/javascript">
                swal("Exito", "Los datos del usuario fueron actualizados", "success");
            </script>
            @endif
            @if(Session::has('msg'))
            <!--success info warning danger-->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <strong>{{Session::get('msg')}}</strong>
            </div>
            @endif

            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif
            @if (session('alert'))
            <script type="text/javascript">
                swal("{{ session('alert') }}", "Error!", "danger");
            </script>
            @endif
          
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="color: #8B4513; background-color: LIGHTGRAY">
                    <span><i class="fas fa-laptop-code"></i></span>
                    DATOS DEL EQUIPO
                </div>

                <form method="POST" action="{{route('guardarServicio')}}" role="form">
                    {{ csrf_field() }}
                    <br>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" id="cm">
                            <p>SERIE DIP</p>
                            <!--equipo-->
                            <input type="hidden" name="equipo" id="equipo" value="{{$equipos->id}}">
                            <p>{{ $equipos  -> id }}</p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="cm">
                            <p>SERIE ANTERIOR</p>
                            {{ $equipos  -> serie_equipo_anterior }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>FECHA INGRESO</p>
                            <?php
                                        $originalDate = $equipos->fecha_alta;
                                        $newDate = date("d/m/Y", strtotime($originalDate));
                                    ?>
                            {{ $newDate }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TIPO</p>
                            {{ $equipos  -> tipo }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>MARCA</p>
                            {{ $equipos  -> marca }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>PERSONAL DIP</p>
                            <span style="text-transform: uppercase">{{ $equipos  -> personal_dip }}</span>
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>DEPENDENCIA</p>
                            {{ $equipos  -> unidad_destino }}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4" id="cm">
                            <p>SUBDEPENDENCIA</p>
                            {{ $equipos->subunidad_destino }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>TELEFONO</p>
                            {{ $equipos  -> telefono }}
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" id="cm">
                            <p>IP DEL EQUIPO</p>
                            {{ $equipos  -> ip }}
                        </div>
                    </div>

                    <br><br><br><br>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm">
                            <p>OBSERVACIONES DEL EQUIPO</p>
                            {{ $equipos  -> observaciones }}
                        </div>
                    </div>

                    <br><br><br>

                    <!--COMIENZO CARGA DATOS DEL SERVICIO-->
                    <div class="panel-heading" align="center" style="color: #800080; font-family: roman;
                                    background-color: #ADD8E6">
                        <span><i class="fas fa-wrench"></i></span>
                        INGRESAR SERVICIO
                    </div>
                    <br>

                    <table class="table table-striped">
                        <tr>
                            <th>FECHA INGRESO</th>
                            <th>PERSONAL QUE ENTREGA</th>
                            <th>
                                <!--ACA VA EL BOTON-->
                            </th>
                            <th>NI Y APELLIDO Y NOMBRE</th>
                        </tr>
                        <tr>
                            <!--fecha_ingreso-->
                            <th width="150">
                                <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"
                                    value="<?php echo date("Y-m-d");?>"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>

                            <th width="150">
                                <!--legajo-->
                                <input type="number" name="legajo" id="legajo" class="form-control" maxlength="6"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    placeholder="INGRESE LEGAJO..." required>
                            </th>
                            <th width="10">
                                <!--buscar-->
                                <button type="submit" name="buscar" id="buscar" onclick="cargar()"
                                    style="background-color: #B0E0E6; font-size: 18px">
                                    <i style="background-color: #B0E0E6; color: #CD5C5C" class="fas fa-search-plus"></i>
                                </button>
                            </th>
                            <th width="550">
                                <!--personal_entrega-->
                                <input type="text" name="personal_entrega" id="personal_entrega" class="form-control"
                                    readonly required>
                            </th>
                        </tr>

                        <!--ERROR-->
                        @if (count($errors) > 0)
                        <div class="alert alert-warning" style="font-family: arial; font-size: 16px; color: red">
                            <!-- <strong>PERSONAL QUE ENTREGA INEXISTENTE</strong> PERSONAL QUE ENTREGA INEXISTENTE -->
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </table>

                    <!--Auth::user()->name-->
                    <input type="text" name="personal_div_servicio" id="personal_div_servicio" size="20" hidden
                        value="{{ Auth::user()->name }}">

                    <table class="table table-striped">

                        <!--accesorios-->
                        <tr style="color: black">
                            <th>ACCESORIOS</th>
                        </tr>
                        <tr>
                            <th>
                                <input type="text" style="text-transform:uppercase" class="form-control" size="70"
                                    maxlength="90" name="accesorios" value="SIN ACCESORIOS" required>
                            </th>
                        </tr>
                    </table>
                    <table class="table table-striped">

                        <!--motivo_ingreso-->
                        <tr style="color: black">
                            <th class="text-left">MOTIVO DE INGRESO</th>
                        </tr>

                        <tr>
                            <th>
                                <textarea style="text-transform:uppercase" class="form-control" rows="5" maxlength="250"
                                    name="motivo_ingreso" placeholder="ESCRIBA AQUÍ..." required></textarea>
                            </th>
                            <!--detalle_reparacion-->
                            <input type="text" name="detalle_reparacion" id="detalle_reparacion" hidden maxlength="680">

                            <!--fecha_devolucion-->
                            <script type="text/javascript">
                                window.onload = function () {
                                    var fecha = new Date();
                                    var mes = fecha.getMonth() + 1;
                                    var dia = fecha.getDate();
                                    var ano = fecha.getFullYear();
                                    if (dia < 10)
                                        dia = '0' + dia;
                                    if (mes < 10)
                                        mes = '0' + mes
                                    document.getElementById('fechaActual').value = ano + "-" + mes + "-" + dia;
                                }
                            </script>

                            <input type="date" id="fechaActual" name="fecha_devolucion" hidden>


                            <!--personal_retira-->
                            <input type="text" name="personal_retira" id="personal_retira" hidden
                                value="<?php echo "."; ?>">

                            <!--observacion_retira-->
                            <input type="text" name="observacion_retira" id="observacion_retira" hidden
                                value="<?php echo "."; ?>" maxlength="280">

                            <!--CAMBIO ESTADO "INGRESAR" A "INGRESADO"-->
                            <!--estado_servicio-->
                            <input type="text" name="estado_servicio" id="estado_servicio" hidden
                                value="<?php echo "INGRESADO";?>">
                            <!--lg md sm xs -->
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-success btn-md">INGRESO</button>
                    <button type="reset" class="btn btn-danger btn-md">CANCELAR</button>
                    <input type="button" class="btn btn-info btn-md" value="VOLVER" onclick="history.back()">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection