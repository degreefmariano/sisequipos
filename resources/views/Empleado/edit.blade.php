@extends('layouts.admin')

@section('title', 'SGE')

@section('content')

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
                <center>
                    <div class="panel-heading" style="font-size: 16px; color: black">Editar Personal...
                    </div>
                </center>

                <form method="POST" action="{{ route('empleado.update',$empleado->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-left">N°</th>
                                <th class="text-left">Jerarquia</th>
                                <th class="text-left">NI</th>
                                <th class="text-left">Apellido y Nombre</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th width="80" class="text-left" style="color: green">{{ $empleado->id }}
                                </th>
                                <th class="text-left" width="200">
                                    <div class="threecol" style=" font-size: 120%;">
                                        <select style="color: green" name="jerarquia" required>
                                            <option value="{{$empleado->jerarquia}}" selected>{{$empleado->jerarquia}}
                                            </option>
                                            <option value="Director de Policía"> Director de Policía </option>
                                            <option value="Subdirector de Policía"> Subdirector de Policía </option>
                                            <option value="Comisario Supervisor"> Comisario Supervisor </option>
                                            <option value="Comisario"> Comisario </option>
                                            <option value="Subcomisario"> Subcomisario </option>
                                            <option value="Inspector"> Inspector </option>
                                            <option value="Subinspector"> Subinspector </option>
                                            <option value="Oficial de Policía"> Oficial de Policía </option>
                                            <option value="Suboficial de Policía"> Suboficial de Policía </option>
                                        </select>
                                    </div>
                                </th>
                                <th width="150" class="text-left">
                                    <input style="text-transform:uppercase; color: green" type="text" name="ni" id="ni"
                                        size="6" maxlength="6" required value="{{$empleado->ni}}">
                                </th>
                                <th width="250" class="text-left">
                                    <input style="text-transform:uppercase; color: green" type="text" name="apeynom"
                                        id="apeynom" size="40" maxlength="40" required value="{{$empleado->apeynom}}">
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <button type="submit" class="btn btn-primary btn-md">Editar personal</button>
                    <a href="{{ route('equipo.index') }}" class="btn btn-info btn-md">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection