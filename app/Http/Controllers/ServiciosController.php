<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Servicio;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use DB;
use Illuminate\Http\Request;
use Redirect;

class ServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $idequipo = $request->idequipo;
        $idservicio = $request->idservicio;
        $exitoGuardado = $request->exitoGuardado;
        $ingresado = null;
        $parcial = null;
        $entregar = null;
        $query = null;

        if ($request) {
            $query = trim($request->get('searchText'));
        }
        $equipos = Equipo::all();

        $servicios = Servicio::where('equipo', $query)
            ->orWhere('estado_servicio', 'LIKE', '%'.$query.'%')
            ->orderByRaw('CASE 
                WHEN estado_servicio = "INGRESADO" THEN 1 
                WHEN estado_servicio = "PARCIAL" THEN 2
                WHEN estado_servicio = "ENTREGAR" THEN 3
                ELSE 4 END, 
                estado_servicio, id DESC')
            ->paginate(20);

        $ultimoServicio = Servicio::whereNotNull('fecha_ingreso')->orderBy('fecha_ingreso', 'desc')->first();

        $contadoringresado = Servicio::where('estado_servicio', 'INGRESADO')
            ->get()
            ->count();

        $contadorparcial = Servicio::where('estado_servicio', 'PARCIAL')
            ->get()
            ->count();

        $contadorentregar = Servicio::where('estado_servicio', 'ENTREGAR')
            ->get()
            ->count();

        if ($contadoringresado != 0) {
            $ingresado = $contadoringresado;
        }
        if ($contadorparcial != 0) {
            $parcial = $contadorparcial;
        }
        if ($contadorentregar != 0) {
            $entregar = $contadorentregar;
        }

        return view('Servicio.index', [
            'servicios' => $servicios,
            'searchText' => $query,
            'equipos' => $equipos,
            'contadoringresado' => $contadoringresado,
            'contadorparcial' => $contadorparcial,
            'contadorentregar' => $contadorentregar,
            'ingresado' => $ingresado,
            'parcial' => $parcial,
            'entregar' => $entregar,
            'exitoGuardado' => $exitoGuardado,
            'idequipo' => $idequipo,
            'idservicio' => $idservicio,
            'ultimoServicio' => $ultimoServicio,
        ]);
    }

    public function create($equipo)
    {

        $equipos = Equipo::findOrFail($equipo);

        return view('Servicio.create', ['equipos' => $equipos]);
    }

    public function store(Request $request)
    {
        try {
            $servicio = new Servicio;
            $servicio->equipo = $request->equipo;
            $servicio->fecha_ingreso = $request->fecha_ingreso;
            $servicio->personal_entrega = $request->personal_entrega;
            $servicio->personal_div_servicio = $request->personal_div_servicio;
            $servicio->accesorios = strtoupper($request->accesorios);
            $servicio->motivo_ingreso = strtoupper($request->motivo_ingreso);
            $servicio->detalle_reparacion = strtoupper($request->detalle_reparacion);
            $servicio->fecha_devolucion = $request->fecha_devolucion;
            $servicio->personal_retira = $request->personal_retira;
            $servicio->personal_div_entrega = $request->personal_div_entrega;
            $servicio->observacion_retira = strtoupper($request->observacion_retira);
            $servicio->estado_servicio = $request->estado_servicio;

            if ($servicio->personal_entrega != null) {
                $servicio->save();

                return redirect()->action(
                    'ServiciosController@index',
                    [
                        'exitoGuardado' => true,
                        'idequipo' => $servicio->equipo,
                        'idservicio' => $servicio->id,
                    ]
                );
            } else {
                return Redirect::back()->withErrors(['LEGAJO INEXISTENTE EN PERSONAL QUE ENTREGA']);
            }
        } catch (\Throwable $e) {
            return redirect()->back()->with('alert', 'ERROR');
        }

        return $this->index(null, true);
    }

    public function show($id)
    {
        $servicios = Servicio::find($id);

        return view('Servicio.show', compact('servicios'));
    }

    public function edit($id)
    {
        $empleado = DB::table('empleados')
            ->select('id', 'apeynom')
            ->orderBy('id')
            ->get();

        $servicio = Servicio::findOrFail($id);

        $dependencias = DB::table('dependencias')
            ->select('id', 'nro', 'nombre')
            ->orderBy('nro')
            ->get();

        return view('Servicio.edit', compact('servicio', 'dependencias', 'empleado'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->equipo = $request->equipo;
        $servicio->fecha_ingreso = $request->fecha_ingreso;
        $servicio->personal_entrega = $request->personal_entrega;
        $servicio->personal_div_servicio = $request->personal_div_servicio;
        $servicio->accesorios = strtoupper($request->accesorios);
        $servicio->motivo_ingreso = strtoupper($request->motivo_ingreso);
        $servicio->detalle_reparacion = strtoupper($request->detalle_reparacion);
        $servicio->fecha_devolucion = $request->fecha_devolucion;
        $servicio->personal_retira = $request->personal_retira;
        $servicio->personal_div_entrega = $request->personal_div_entrega;
        $servicio->observacion_retira = strtoupper($request->observacion_retira);
        $servicio->estado_servicio = $request->estado_servicio;

        if ($servicio->detalle_reparacion == null && $servicio->estado_servicio == 'ENTREGAR') {

            return Redirect::back()->withErrors(['PARA ENTREGAR DEBE PRIMERO COMPLETAR LA DESCRIPCION DE LA FALLA']);
        } else {
            if ($servicio->personal_retira != null) {
                $servicio->update();
                $redirect = redirect()->route('servicio.index', $servicio->id)
                    ->with('success', 'SERVICIO N° |'.$servicio->id.'| DE SERIE DIP N° |'.$servicio->equipo.'| ACTUALIZADO');

                if ($request->estado_servicio == 'ENTREGADO') {
                    $redirect->with('id', $servicio->id);
                }

                return $redirect;
            } else {
                return Redirect::back()->withErrors(['LEGAJO INEXISTENTE EN PERSONAL QUE RETIRA']);
            }
        }
    }

    public function destroy($id)
    {
        Servicio::find($id)->delete();

        return redirect()->route('servicio.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function getServicios()
    {
        $servicios = Servicio::all();

        return response()->json($servicios);
    }

    public function orderPdf($id)
    {
        $servicio = Servicio::findOrFail($id);
        $pdf = PDF::loadView('vista', ['servicio' => $servicio]);
        $name =
            'Fecha ingreso_'.$servicio->fecha_ingreso.'_'.
            'Equipo_'.$servicio->aequipo->id.'_'.
            'Servicio_'.$servicio->id.'.pdf';

        return $pdf->stream($name);
    }

    public function estadisticasenPdf(Request $request)
    {
        $total = $request->total;
        $newDesde = $request->newDesde;
        $newHasta = $request->newHasta;
        $armaPdf = PDF::loadView('estadisticaspdf', compact('total', 'newDesde', 'newHasta'));

        return $armaPdf->stream('estadisticas.pdf');
    }

    public function getEmpleado(Request $request)
    {
        $legajo = $request->id;

        $empleado = DB::table('empleados')->where('ni', '=', $legajo)
            ->get();

        return response()->json(['empleado' => $empleado]);
    }

    public function getEmpleadoDev(Request $request)
    {
        $legajoDev = $request->id;

        $empleado = DB::table('empleados')
            ->where('ni', $legajoDev)
            ->get();

        return response()->json(['empleado' => $empleado]);
    }
}
