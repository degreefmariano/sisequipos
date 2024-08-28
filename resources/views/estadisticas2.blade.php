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

<div class="col-md-15 col-md-offset-0 col-xs-20">
<form action="{{url('/estadisticasresultadofinal2')}}" method="get">
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
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #5b5f16">
                        <span><i class="fas fa-chart-bar"></i></span>
                        ESTADISTICAS2
                    </div>

                    {{ csrf_field() }}


<br>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                        <p>AÑO</p>
                        <div class="threecol">
                          <select name="año" id="año" class="selectpicker form-control" data-live-search="true" required>
                            <option value="" disabled selected>SELECCIONE...</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                          </select>
                        </div>
                      </div>                    
{{-- 
                    <table class="table table-striped">
                        <tr style="color: black">
                            <th class="text-left" width="10">DESDE</th>
                            <th class="text-left">HASTA</th>
                        </tr>
                        <tr>
                            <!--fecha_desde-->
                            <th class="text-left">
                                <input type="date" name="fecha_desde" class="form-control" id="fecha_desde"
                                    style="width: 200px" value="<?php echo date("Y-m-d");?>"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                            <!--fecha_hasta-->
                            <th class="text-left">
                                <input type="date" name="fecha_hasta" class="form-control" id="fecha_hasta"
                                    style="width: 200px" value="<?php echo date("Y-m-d");?>"
                                    max="<?php echo date("Y-m-d",strtotime(date("Y-m-d"))); ?>" required>
                            </th>
                        </tr>
                    </table> --}}

                    <button type="submit" class="btn btn-md" active
                        style="background-color: #800080; color: white">BUSCAR</button>
                    <a href="servicio" class="btn btn-info btn-md active">VOLVER</a>
<br><br><br>
                    <a class="navbar-brand" href="{{url('expenses')}}" style="color: #5b5f16; font-family: roman">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span><i class="fas fa-chart-bar"></i></span>&nbsp;ESTADISTICAS&nbsp;
                    </a>


                </div>
            </div>
        </div>
    </div>
</form>
</div>
<div class="col-md-15 col-md-offset-0 col-xs-20">
    <a class="navbar-brand" href="{{url('expenses')}}" style="color: #5b5f16; font-family: roman">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span><i class="fas fa-chart-bar"></i></span>&nbsp;ESTADISTICAS&nbsp;
    </a>
</div>



@endsection