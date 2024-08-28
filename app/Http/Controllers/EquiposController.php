<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use DB;

class EquiposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $idequipo          = $request->idequipo;
        $exitoGuardado     = $request->exitoGuardado;
        $exitoGuardadoEdit = $request->exitoGuardadoEdit;
        $errorGuardadoEdit = $request->errorGuardadoEdit;
        $query = null;
        if ($request) {
            $query = trim($request->get('searchText'));
        }
        $equipos = Equipo::where('id', $query)
            ->orwhere('tipo', 'LIKE', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('Equipo.index', [
            "equipos"           => $equipos,
            "searchText"        => $query,
            "exitoGuardado"     => $exitoGuardado,
            "idequipo"          => $idequipo,
            "exitoGuardadoEdit" => $exitoGuardadoEdit,
            "errorGuardadoEdit" => $errorGuardadoEdit
        ]);
    }

    public function create()
    {
        $equipos = DB::table('equipos')->get();

        $dependencias = DB::table('dependencias')
            ->select('id', 'nro', 'nombre')
            ->orderBy('nombre')
            ->get();

        $subdependencias = DB::table('subdependencias')
            ->select('id', 'cod', 'nombre')
            ->orderBy('id')
            ->get();

        return view("Equipo.create", [
            "equipos"         => $equipos,
            "dependencias"    => $dependencias,
            "subdependencias" => $subdependencias
        ]);
    }

    public function store(Request $request)
    {
        try {
            $equipo                        = new Equipo;
            $equipo->serie_equipo_anterior = $request->serie_equipo_anterior;
            $equipo->fecha_alta            = $request->fecha_alta;
            $equipo->tipo                  = $request->tipo;
            $equipo->marca                 = $request->marca;
            $equipo->unidad_destino        = $request->unidad_destino;
            $equipo->subunidad_destino     = $request->subunidad_destino;
            $equipo->telefono              = $request->telefono;
            $equipo->ip                    = $request->ip;
            $equipo->personal_dip          = $request->personal_dip;
            $equipo->observaciones         = $request->observaciones;
            $equipo->estado_equipo         = $request->estado_equipo;

            $equipo->save();
            return redirect()->action(
                'EquiposController@index',
                [
                    'exitoGuardado' => true,
                    'idequipo' => $equipo->id
                ]
            );

        } catch (\Throwable $e) {
            return redirect()->back()->with('alert', 'ERROR');
        }
        return $this->index(null, true);
    }

    public function show($id)
    {
        $equipos = Equipo::find($id);
        $clave   = $equipos->id;

        $servicios = DB::table('servicios')
            ->where('equipo', $clave)
            ->orderBy('id', 'desc')
            ->get();
        $total = $servicios->count();

        return view('Equipo.show', compact('equipos', 'servicios', 'total'));
    }

    public function edit($id)
    {
        $equipo       = Equipo::findOrFail($id);
        $dependencias = DB::table('dependencias')
            ->select('id', 'nro', 'nombre')
            ->orderBy('nombre')
            ->get();
        return view('Equipo.edit', compact('equipo', 'dependencias'));
    }

    public function update(Request $request, $id)
    {
        try {
            $equipo                        = Equipo::find($id);
            $equipo->serie_equipo_anterior = $request->serie_equipo_anterior;
            $equipo->fecha_alta            = $request->fecha_alta;
            $equipo->tipo                  = $request->tipo;
            $equipo->marca                 = $request->marca;
            $equipo->unidad_destino        = $request->unidad_destino;
            $equipo->subunidad_destino     = $request->subunidad_destino;
            $equipo->telefono              = $request->telefono;
            $equipo->ip                    = $request->ip;
            $equipo->personal_dip          = $request->personal_dip;
            $equipo->observaciones         = $request->observaciones;
            $equipo->estado_equipo         = $request->estado_equipo;

            if ($equipo->isDirty()) {
                equipo::find($id)->update($request->all());
                return redirect()->action(
                    'EquiposController@index',
                    [
                        'exitoGuardadoEdit' => true,
                        'idequipo' => $equipo->id
                    ]
                );
            } else {
                return redirect()->action(
                    'EquiposController@index',
                    [
                        'errorGuardadoEdit' => true,
                        'idequipo' => $equipo->id
                    ]
                );
            }
        } catch (\Throwable $e) {

            return redirect()->back()->with('alert', 'EL REGISTRO YA EXISTE');
        }
        return redirect()->back()->with('alert2', 'REGISTRO ACTUALIZADO');
    }

    public function destroy($id)
    {
        Equipo::find($id)->delete();
        return redirect()->route('equipo.index')->with('success', 'Equipo eliminado satisfactoriamente');
    }

    public function getEquipos()
    {
        $equipos = Equipo::all();
        return response()->json($equipos);
    }
}
