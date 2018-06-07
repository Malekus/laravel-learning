<?php

namespace App\Http\Controllers;

use App\Charts\HomeChart;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){

        $chart = new HomeChart;
        $chart->dataset('Sample', 'line', [100, 65, 84, 45, 90]);
        return view('home.index', compact('chart'));
    }
}
