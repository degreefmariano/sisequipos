<?php

namespace App\Http\Controllers;

use App\Empleado;
use DB;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $empleados = DB::table('empleados')
                ->where('ni', 'LIKE', '%'.$query.'%')
                ->orwhere('apeynom', 'LIKE', '%'.$query.'%')
                ->orwhere('jerarquia', 'LIKE', '%'.$query.'%')
                ->orderBy('ni', 'desc')
                ->paginate(20);

            return view('Empleado.index', ['empleados' => $empleados, 'searchText' => $query]);
        }
    }

    public function create()
    {
        return view('Empleado.create');
    }

    public function store(Request $request)
    {
        $empleado = new Empleado;
        $empleado->jerarquia = $request->jerarquia;
        $empleado->ni = $request->ni;
        $empleado->apeynom = $request->apeynom;

        $empleado->save();

        return redirect()->route('empleado.index', $empleado->id);
    }

    public function show($id)
    {
        $empleados = Empleado::find($id);

        return view('empleado.show', compact('empleados'));
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jerarquia' => 'required',
            'ni' => 'required',
            'apeynom' => 'required',
        ]);
        empleado::find($id)->update($request->all());

        return redirect()->route('empleado.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        Empleado::find($id)->delete();

        return redirect()->route('empleado.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function getEmpleados()
    {
        $empleados = Empleado::all();

        return response()->json($empleados);
    }
}
