<?php

namespace App\Http\Controllers;

use App\Charts\ExpensesChart;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index(ExpensesChart $chart, $año)
    {
        return view('expenses.index', ['chart' => $chart->build()]);   
    }
}
