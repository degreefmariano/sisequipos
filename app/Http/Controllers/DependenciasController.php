<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependencia;

class DependenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dependencias = Dependencia::Search($request->nro)->orderBy('nro', 'DESC')->paginate(20);
        $dependencias->each(function ($dependencias) {
            $dependencias->nro;
        });
        return view('Dependencia.index')
            ->with('dependencias', $dependencias);
    }

    public function create(Request $request)
    {
        return view('Dependencia.create');
    }

    public function store(Request $request)
    {
        $dependencia         = new Dependencia;
        $dependencia->nro    = $request->nro;
        $dependencia->nombre = $request->nombre;

        $dependencia->save();

        return redirect()->route('dependencia.index', $dependencia->nro);
    }

    public function show($nro)
    {
        $dependencias = Dependencia::find($nro);
        return view('dependencia.show', compact('dependencias'));
    }

    public function edit($nro)
    {
        $dependencia = Dependencia::find($nro);
        return view('dependencia.edit', compact('dependencia'));
    }

    public function update(Request $request, $nro)
    {
        $this->validate($request, [
            'nro'    => 'required',
            'nombre' => 'required',
        ]);
        dependencia::find($nro)->update($request->all());
        return redirect()->route('dependencia.index')->with('success', 'Registro actualizado');
    }

    public function destroy($id)
    {
        Dependencia::find($id)->delete();
        return redirect()->route('dependencia.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function getDependencias()
    {
        $dependencias = Dependencia::all();
        return response()->json($dependencias);
    }
}
