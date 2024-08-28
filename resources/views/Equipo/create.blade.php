@extends('layouts.admin')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('button[type="reset"]').on('click', function() {
      setTimeout(function() {
        $('select').val('');
        $('.selectpicker').selectpicker('refresh'); // Si estás usando Bootstrap SelectPicker
      }, 0);
    });
  });
</script>


<div class="container">
  <div class="row">
    <div class="col-md-15 col-md-offset-0 col-xs-20">

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
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
      @endif

      <div class="panel panel-default">
        <div class="panel-heading" align="center" style="color: #D2691E; font-family: roman;
                   background-color: LIGHTGRAY">
          <span><i class="fas fa-laptop"></i></span>
          INGRESAR EQUIPOS
        </div>
        <form method="POST" action="{{ route('equipo.store') }}" role="form">

          {{ csrf_field() }}
          <br>
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="row justify-content-center">

              <!--serie_equipo_anterior -->

              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="background-color: #dbeddc">
                <p>SERIE ANTERIOR</p>
                <input type="text" name="serie_equipo_anterior" class="form-control" maxlength="20" value="S/N"
                  required>
              </div>

              <!--fecha_alta-->

              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="background-color: #dbeddc">
                <script type="text/javascript">
                  window.onload = function () {
                    var fecha = new Date(); //Fecha actual
                    var mes = fecha.getMonth() + 1; //obteniendo mes
                    var dia = fecha.getDate(); //obteniendo dia
                    var ano = fecha.getFullYear(); //obteniendo año
                    if (dia < 10)
                      dia = '0' + dia; //agrega cero si el menor de 10
                    if (mes < 10)
                      mes = '0' + mes //agrega cero si el menor de 10
                    document.getElementById('fechaActual').value = ano + "-" + mes + "-" + dia;
                  }
                </script>

                <p>FECHA INGRESO</p>
                <input type="date" name="fecha_alta" id="fechaActual" class="form-control"
                  value="<?php echo date("d/m/Y");?>" max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>"
                  required>
              </div>

              <!--tipo-->

              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="background-color: #dbeddc">
                <p>TIPO</p>
                <div class="threecol">
                  <select name="tipo" id="tipo" class="selectpicker form-control" data-live-search="true" required>
                    <option value="" disabled selected>SELECCIONE...</option>
                    <option value="ALL IN ONE"> ALL IN ONE </option>
                    <option value="CPU"> CPU </option>
                    <option value="ESCANER"> ESCANER </option>
                    <option value="ESTABILIZADOR"> ESTABILIZADOR </option>
                    <option value="IMPRESORA"> IMPRESORA </option>
                    <option value="MATERIALES"> MATERIALES </option>
                    <option value="MONITOR"> MONITOR </option>
                    <option value="MOUSE"> MOUSE </option>
                    <option value="NETBOOK"> NETBOOK </option>
                    <option value="NOTEBOOK"> NOTEBOOK </option>
                    <option value="REPUESTOS"> REPUESTOS </option>
                    <option value="SWITCH"> SWITCH </option>
                    <option value="OTROS"> OTROS </option>
                  </select>
                </div>
              </div>

              <!--marca-->

              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="background-color: #dbeddc">
                <p>MARCA</p>
                <div class="threecol">
                  <select name="marca" id="marca" class="selectpicker form-control" data-live-search="true" required>
                    <option value="" disabled selected>SELECCIONE...</option>
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
                    <option value="EXO"> EXO </option>
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
                    <option value="PACKARD DELL"> PACKARD DELL </option>
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
              </div>
            </div>
          </div>

          <br><br><br><br><br>

          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="row justify-content-center">

              <!--unidad_destino-->

              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" style="background-color: #dbeddc">
                <p>DEPENDENCIA</p>

                <select name="unidad_destino" id="unidad_destino" class="selectpicker form-control"
                  data-live-search="true" required>
                  <option value="" selected disabled>
                    SELECCIONE...
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

              <!--subunidad_destino-->

              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" style="background-color: #dbeddc">
                <p>SUBDEPENDENCIA</p>
                <input type="text" name="subunidad_destino" maxlength="20" class="form-control"
                  style="text-transform:uppercase" onkeyup="this.value=this.value.toUpperCase();"
                  placeholder="ESCRIBA AQUI..." required>
              </div>

              <!--telefono-->

              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" style="background-color: #dbeddc">
                <p>TELEFONO</p>
                <input type="tel" name="telefono" class="form-control" maxlength="20" placeholder="ESCRIBA AQUI..."
                  required>
              </div>

            </div>
          </div>

          <br><br><br><br><br>

          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="row justify-content-center">

              <!--ip-->

              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="background-color: #dbeddc">
                <p>IP DEL EQUIPO</p>
                <input type="text" name="ip" size="20" maxlength="20" style="text-transform:uppercase"
                  onkeyup="this.value=this.value.toUpperCase();" value="SIN NUMERO DE IP" class="form-control">
              </div>
            </div>
          </div>

          <br><br><br><br><br>

          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="row justify-content-center">

              <!--observaciones-->

              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="background-color: #dbeddc">
                <p>OBSERVACIONES DEL EQUIPO</p>
                <input type="text" name="observaciones" size="120" maxlength="120" style="text-transform:uppercase"
                  onkeyup="this.value=this.value.toUpperCase();" value="SIN OBSERVACIONES" class="form-control">
              </div>
            </div>
          </div>

          <!--user-->
          <input type="text" name="personal_dip" id="personal_dip" size="20" hidden value="{{ Auth::user()->name }}">

          <!--estado_equipo-->
          <input type="text" name="estado_equipo" id="estado_equipo" size="20" hidden value=ingresar>

          <br><br><br><br><br><br>

          <button type="submit" class="btn btn-success btn-md">INGRESAR</button>
          <button type="reset" class="btn btn-danger btn-md">CANCELAR</button>
          <input type="button" class="btn btn-info btn-md" value="VOLVER" onclick="history.back()">
        </form>
      </div>
      <!--<div class="panel panel-default">-->
    </div>
    <!--<div class="col-md-15 col-md-offset-0 col-xs-20">-->
  </div>
  <!--<div class="row">-->
</div>
<!--<div class="container">-->

@endsection