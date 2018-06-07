<?php

namespace App\Http\Controllers;

use App\Charts\HomeChart;
use App\Personne;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){

        $chart = new Chart();
        $personne = Personne::all();
        $chart->dataset('Sample', 'line', [100, 65, 84, 45, 90]);
        $chart->labels(['a', 'z', 'e', 'r', 't']);
        $chart->dataset('Mec', 'line', [54, 465, 6, 98, 21]);
        return view('home.index', compact('chart'));
    }
}
