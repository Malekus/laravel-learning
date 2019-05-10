<?php

namespace App\Http\Controllers;

use App\Action;
use App\Partenaire;
use App\Personne;
use App\Probleme;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class HomeController extends Controller
{
    public function index()
    {

        $chart = new Chart();
        $chart->dataset('Sample', 'line', [100, 65, 84, 45, 90]);
        $chart->labels(['a', 'z', 'e', 'r', 't']);
        $chart->dataset('Mecé', 'line', [54, 465, 6, 98, 21]);

        $chart1 = \Chart::title([
            'text' => 'Voting ballon d`or 2018',
        ])
            ->chart([
                'type' => 'spline',
                'renderTo' => 'chart1',
            ])
            ->xaxis([
                'categories' => [
                    'Alex Turner',
                    'Julian Casablancas',
                    'Bambang Pamungkas',
                    'Mbah Surip',
                ],
                'labels' => [
                    'rotation' => 15,
                    'align' => 'top',
                ],
            ])
            ->yaxis([
                'text' => 'This Y Axis',
            ])
            ->legend([
                'layout' => 'vertikal',
                'align' => 'right',
                'verticalAlign' => 'middle',
            ])
            ->series(
                [
                    [
                        'name' => 'Voting',
                        'data' => [43934, 52503, 57177, 69658],
                    ],
                ]
            )
            ->credits([
                'enabled' => false
            ])
            ->display();

        $personneCount = Personne::count();
        $partenaireCount = Partenaire::count();
        $problemeCount = Probleme::count();
        $actionCount = Action::count();

        return view('home.index', compact(['chart', 'chart1', 'personneCount', 'problemeCount', 'partenaireCount', 'actionCount']));
    }

    public function semantic()
    {
        return view('semantic.home');
    }

    private function chart($titre_graphe, $type_graphe, $nom_graphe)
    {
        return \Chart::title([
            'text' => $titre_graphe,
        ])
            ->chart([
                'type' => $type_graphe,
                'renderTo' => $nom_graphe,
            ])
            ->subtitle([
                'text' => 'This Subtitle',
            ])
            ->xaxis([
                'categories' => [
                    'Alex Turner',
                    'Julian Casablancas',
                    'Bambang Pamungkas',
                    'Mbah Surip',
                ],
                'labels' => [
                    'rotation' => 15,
                    'align' => 'top',
                ],
            ])
            ->yaxis([
                'text' => 'This Y Axis',
            ])
            ->legend([
                'layout' => 'vertikal',
                'align' => 'right',
                'verticalAlign' => 'middle',
            ])
            ->series(
                [
                    [
                        'name' => 'Voting',
                        'data' => [43934, 52503, 57177, 69658],
                    ],
                ]
            )
            ->credits([
                'enabled' => false
            ])
            ->display();
    }
}
