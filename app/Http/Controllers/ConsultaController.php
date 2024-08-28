<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use DB;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function fechaeq(Request $request)
    {
        $f1 = $request->fecha_desde;
        $f2 = $request->fecha_hasta;

        if ($f1 <= $f2) {
            $equipos = DB::table('equipos')
                ->whereBetween('fecha_alta', [$request->fecha_desde, $request->fecha_hasta])
                ->orderBy('fecha_alta', 'DESC')
                ->get();

            $a = (count($equipos));
            if ($a >= 0) {
                return view('fechasequiporesultadofinal', [
                    'equipos' => $equipos,
                    'f1' => $f1,
                    'f2' => $f2,
                    'a' => $a,
                ]);
            } else {
                return view('fechasequipo', compact('equipos'));
            }

            return view('fechasequipo', compact('equipos'));
        } else {
            return view('fechasequipo', compact('equipos'));
        }
    }

    public function fechaserv(Request $request)
    {
        $f1 = $request->fecha_desde;
        $f2 = $request->fecha_hasta;

        if ($f1 <= $f2) {
            $servicios = DB::table('servicios')
                ->whereBetween('fecha_ingreso', [$request->fecha_desde, $request->fecha_hasta])
                ->orderBy('fecha_ingreso', 'DESC')
                ->get();

            $a = (count($servicios));
            if ($a >= 0) {
                return view('fechasservicioresultadofinal', [
                    'servicios' => $servicios,
                    'f1' => $f1,
                    'f2' => $f2,
                    'a' => $a,
                ]);
            } else {
                return view('fechasservicio', compact('servicios'));
            }

            return view('fechasservicio', compact('servicios'));
        } else {
            return view('fechasservicio', compact('servicios'));
        }
    }

    public function estadisticas(Request $request)
    {
        $desde = $request->fecha_desde;
        $hasta = $request->fecha_hasta;

        if ($desde <= $hasta) {
            $servicios = DB::table('servicios')
                ->whereBetween('fecha_ingreso', [$request->fecha_desde, $request->fecha_hasta])
                ->orderBy('fecha_ingreso', 'DESC')
                ->get();

            $total = (count($servicios));
            if ($total >= 0) {
                return view('estadisticasresultadofinal',
                    [
                        'servicios' => $servicios,
                        'total' => $total,
                        'desde' => $desde,
                        'hasta' => $hasta,
                    ]);
            } else {
                return view('estadisticas', compact('servicios'));
            }

            return view('estadisticas', compact('servicios'));
        } else {
            return view('estadisticas', compact('servicios'));
        }
    }

    public function estadisticaspdf(Request $request)
    {
        $fechaDesde = '2023-08-01';
        $fechaHasta = '2023-08-31';
        $total = 12345;

        $fechaDesdeFormateada = date('d-m-Y', strtotime($fechaDesde));
        $fechaHastaFormateada = date('d-m-Y', strtotime($fechaHasta));

        $pdf = PDF::loadView('estadisticaspdf', [
            'fechaDesde' => $fechaDesdeFormateada,
            'fechaHasta' => $fechaHastaFormateada,
            'total' => $total,
        ]);
        $pdf->setPaper('A4', 'portrait');
        $pdf->save('mi-informe.pdf');
    }
}
