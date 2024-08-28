@extends('layouts.admin')

@section('content')

<div class="container">

    <!--INICIO BUSCADORES-->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                BÚSQUEDA DEL PERSONAL
            </div>
        </div>
        <!--COLUMNA 1-->
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
            <a onclick="window.close();" class="btn btn-default btn-md active" style="background-color: white">
                <span><i class="far fa-eye-slash"></i></span> Cerrar
            </a>
        </div>
        <!--COLUMNA 2-->
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
        </div>
        <!--COLUMNA 3-->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align: right; width: 250px">
            <form>
                <div class="input-group input-group-md">
                    <div class="input-group">
                        <input style="text-transform:uppercase" onkeyup="this.value=this.value.toUpperCase();"
                            type="text" class="form-control" name="searchText" placeholder="Buscar..."
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
    </div>
    <!--FIN BUSCADORES-->

    <!--lg md sm xs -->
    @if (empty($searchText))

    @else
    <div class="col-md-15 col-md-offset-0 col-xs-20">
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center" width="115">Jerarquía</th>
                        <th class="text-center" width="60">NI</th>
                        <th class="text-left" width="500">Apellido y Nombre</th>
                    </tr>
                </thead>
            </table>

            <table>
                <tbody>
                    @if($empleados->count())
                    @foreach($empleados as $empleado)

                    <tr>
                        <td align="left" style="font-size: 16px; width: 220px">
                            {{ $empleado -> jerarquia }}
                        </td>
                        <td align="left" style="font-size: 16px">
                            <script src="{{ asset('plugins/clipboard.js-master/dist/clipboard.js') }}">
                            </script>
                            <input type="text" value="{{ 
                                                $empleado->ni.'  '.
                                                $empleado->apeynom
                                             }}" id="myInput" size="110" readonly style="font-size: 16px">
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <table class="table table-striped">
                        <tr style="background: #e5e5e5">
                            <td align="left">
                                <p class="text-danger">PERSONAL INEXISTENTE</p>
                            </td>
                        </tr>
                    </table>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{ $empleados->links() }}
    </div>
    @endif
</div>

@endsection