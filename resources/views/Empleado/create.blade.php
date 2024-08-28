@extends('layouts.admin')

@section('title', 'SGE')

@section('content')

<div class="container">
    <div class="row">
        <!--COLUMNA 1-->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
            <a href="{{ route('home') }}" class="btn btn-default btn-md active" style="background-color: lightblue">
                <span class="glyphicon glyphicon-menu-up"></span> Menu
            </a>
        </div>
        <!--COLUMNA 2-->
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="text-align: center">

        </div>
        <!--COLUMNA 3-->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align: right;">

        </div>
    </div>
</div>

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
                <div class="panel-heading" style="font-size: 16px; text-align: center; color: green">
                    Ingresar Personal
                </div>

                <form method="POST" action="{{ route('empleado.store') }}" role="form">

                    {{ csrf_field() }}
                    <table class="table table-striped" id="MyTable">
                        <thead>
                            <tr>
                                <th class="text-left">Jerarquía</th>
                                <th class="text-left">NI</th>
                                <th class="text-left">Apellido y Nombre</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <!--jerarquia-->
                                <th class="text-left" width="200">
                                    <div class="threecol" style=" font-size: 120%;">
                                        <select style="color: green" name="jerarquia" required>
                                            <option value="" disabled selected>---- seleccionar ----</option>
                                            <option value="Director de Policía"> DIRECTOR DE POLICÍA </option>
                                            <option value="Subdirector de Policía"> SUBDIRECTOR DE POLICÍA </option>
                                            <option value="Comisario Supervisor"> COMISARIO SUPERVISOR </option>
                                            <option value="Comisario"> COMISARIO </option>
                                            <option value="Subcomisario"> SUBCOMISARIO </option>
                                            <option value="Inspector"> INSPECTOR </option>
                                            <option value="Subinspector"> SUBINSPECTOR </option>
                                            <option value="Oficial de Policía"> OFICIAL DE POLICÍA </option>
                                            <option value="Suboficial de Policía"> SUBOFICIAL POLICÍA </option>
                                        </select>
                                    </div>
                                </th>
                                <!--ni-->
                                <th class="text-left" width="50">
                                    <input style="color: green" type="text" name="ni" size="6" maxlength="6" required>
                                </th>
                                <!--apeynom-->
                                <th class="text-left">
                                    <input style="text-transform:uppercase; color: green" type="text" name="apeynom"
                                        size="40" maxlength="40" required>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="submit" class="btn btn-success btn-md">Ingresar Personal</button>
                    <button type="reset" class="btn btn-danger btn-md">Cancelar</button>
                    <input type="button" class="btn btn-info btn-md" value="Volver" onclick="history.back()">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection