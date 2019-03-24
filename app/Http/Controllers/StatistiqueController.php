<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{

    public function index()
    {
        return view('statistique.index');
    }

    public function stats($type = null)
    {
        $nom_graphe = $type . 'Chart';
        if ($type == 'sexe') {
            $personnes = DB::table('personnes')
                ->select(DB::raw('count(*) as nb, sexe as label'))
                ->groupBy('sexe')
                ->orderBy('sexe')
                ->get();
            $r = $this->exploite($personnes);
            $categorie = $r[0];
            $values = $r[1];
            $chart = $this->createChart('Nombre de bénéficiaire en 2018', 'column', $nom_graphe, ['categories' => $categorie, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => true]);
            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        $chart = $this->createPie('Nombre de bénéficiare en 2018', $nom_graphe );

        return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => [$chart]]);
    }

    private function createChart($titre_graphe, $type_graphe, $nom_graphe, $options = [])
    {
        $chart = \Chart::title([
            'text' => $titre_graphe,
        ])
            ->chart([
                'type' => $type_graphe,
                'renderTo' => $nom_graphe,
            ])
            ->xaxis([
                'categories' => $options['categories'],
                'labels' => [
                    'rotation' => 15,
                    'align' => 'top',
                ],
            ])
            ->yaxis([
                'title' => [
                    'text' => 'Nombre de personne',
                ],
            ])
            ->series(
                [
                    [
                        'data' => $options['data'],
                        'name' => isset($options['nameLegend']) ? $options['nameLegend'] : '',
                        'showInLegend' => isset($options['showInLegend']) ? $options['showInLegend'] : false,

                    ],
                ]
            )
            ->credits([
                'enabled' => false
            ])
            /*;
            if(isset($options['dataLabels'])){

            }*/
            ->plotOptions([
                'column' => [
                    'dataLabels' => [
                        'enabled' => isset($options['dataLabels']) ? true : false,
                    ]
                ]
            ])
            ->display();

        return $chart;
    }

    private function createPie($titre_graphe, $nom_graphe, $options = [])
    {
        $chart = \Chart::title([
            'text' => $titre_graphe,
        ])
            ->chart([
                'type' => 'pie',
                'renderTo' => $nom_graphe,
            ]);

        return $chart;
    }

    private function exploite($data)
    {

        $keys = $values = [];

        foreach ($data as $key => $value) {
            array_push($values, $value->nb);
            array_push($keys, ucfirst($value->label));
        }

        return [$keys, $values];
    }

}
