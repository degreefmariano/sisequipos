<?php

namespace App\Charts;

use App\Equipo;
use App\Servicio;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        // $query = Equipo::all();
        // $ids = $query->pluck('id');
        //dd($ids);

        //$query = Equipo::all();

        // $equiposPorMes = $query->groupBy(function ($equipo) {
        //     return $equipo->fecha_alta;
        // });

        // foreach ($equiposPorMes as $mes => $equipos) {
        //     echo "En el mes de $mes, se crearon $equipos equipos.";
        // }
        /*$query = Equipo::whereMonth('fecha_alta', 1);
        $equipos = $query->get();
        dd(count($equipos));*/
        dd('oo');
        $año = 2023;

        $eqEne = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 1)->count();
        $eqFeb = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 2)->count();
        $eqMar = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 3)->count();
        $eqAbr = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 4)->count();
        $eqMay = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 5)->count();
        $eqJun = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 6)->count();
        $eqJul = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 7)->count();
        $eqAgo = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 8)->count();
        $eqSep = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 9)->count();
        $eqOct = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 10)->count();
        $eqNov = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 11)->count();
        $eqDic = Equipo::whereYear('fecha_alta', $año)->whereMonth('fecha_alta', 12)->count();
        //dd($eqEne, $eqFeb, $eqMar, $eqAbr, $eqMay, $eqJun, $eqJul, $eqAgo, $eqSep, $eqOct, $eqNov, $eqDic);
        $eq = $eqEne + $eqFeb + $eqMar + $eqAbr + $eqMay + $eqJun + $eqJul + $eqAgo + $eqSep + $eqOct + $eqNov + $eqDic;

        $seEne = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 1)->count();
        $seFeb = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 2)->count();
        $seMar = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 3)->count();
        $seAbr = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 4)->count();
        $seMay = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 5)->count();
        $seJun = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 6)->count();
        $seJul = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 7)->count();
        $seAgo = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 8)->count();
        $seSep = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 9)->count();
        $seOct = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 10)->count();
        $seNov = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 11)->count();
        $seDic = Servicio::whereYear('fecha_ingreso', $año)->whereMonth('fecha_ingreso', 12)->count();
        //dd($seEne, $seFeb, $seMar, $seAbr, $seMay, $seJun, $seJul, $seAgo, $seSep, $seOct, $seNov, $seDic);
        $se = $seEne + $seFeb + $seMar + $seAbr + $seMay + $seJun + $seJul + $seAgo + $seSep + $seOct + $seNov + $seDic;

        return $this->chart->barChart()
            ->setTitle('En el año: '.$año.', ingresaron la cantidad de '.$eq.' equipos y '.$se.' servicios')
            // ->setSubtitle('Año 2023')
            ->addData('Equipos', [$eqEne, $eqFeb, $eqMar, $eqAbr, $eqMay, $eqJun, $eqJul, $eqAgo, $eqSep, $eqOct, $eqNov, $eqDic])
            ->addData('Servicios', [$seEne, $seFeb, $seMar, $seAbr, $seMay, $seJun, $seJul, $seAgo, $seSep, $seOct, $seNov, $seDic])
            ->setXAxis(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
    }
}
