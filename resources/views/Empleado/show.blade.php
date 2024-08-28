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
                    <div class="panel-heading" style="font-size: 16px; color: black">Ver Empleado
                    </div>
                </center>

                <form method="POST" action="{{ route('empleado.show',$empleados->id) }}" role="form">
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
                        <tfoot style="color: #777777">
                            <tr>
                                <td align="left" width="70">{{ $empleados  -> id }}</td>
                                <td align="left" width="200">{{ $empleados  -> jerarquia }}</td>
                                <td align="left" width="200">{{ $empleados  -> ni }}</td>
                                <td align="left" width="1000">{{ $empleados  -> apeynom }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="{{ route('empleado.index') }}" class="btn btn-info btn-md">Volver</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection