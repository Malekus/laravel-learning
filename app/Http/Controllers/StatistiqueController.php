<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{

    public function index(Request $request)
    {

        if ($request->get('search') == null) {
            $dateNow = \Carbon\Carbon::now()->format('Y');
            return view('statistique.index', compact('dateNow'));
        }

        $dateNow = $request->get('search');
        return view('statistique.index', compact('dateNow'));
    }

    public function stats($date, $type = null)
    {
        $nom_graphe = $type . 'Chart';
        if ($type == 'sexe') {
            $personnes = DB::table('personnes')
                ->select(DB::raw('count(*) as nb, sexe as label'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('sexe')
                ->orderBy('sexe')
                ->get();
            $r = $this->exploite($personnes);
            $categorie = $r[0];

            $values = $r[1];
            $chart = $this->createChart('Nombre de bénéficiaire en ' . $date, 'column', $nom_graphe, ['categories' => $categorie, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => true]);
            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        if ($type == 'probleme') {
            $problemes = DB::table('problemes')
                ->join('configurations', 'categorie_id', '=', 'configurations.id')
                ->select(DB::raw('count(*) as nb, libelle as label'))// DB::raw('label, count(*) as nbSpe')
                ->groupBy('libelle')
                ->orderBy('libelle')
                ->get();
            $r = $this->exploite($problemes);
            $categorie = $r[0];
            $values = $r[1];
            $chart = $this->createChart('Nombre de problème en ' . $date, 'column', $nom_graphe, ['categories' => $categorie, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => true]);
            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        if ($type == 'action') {
            $actions = DB::table('actions')
                ->select(DB::raw('count(actions.id) as nb, (select libelle from configurations where id = action_id) as label, (select libelle from configurations where id = probleme_id) as field'))// , (select libelle from configurations where id = probleme_id) as field
                ->groupBy('label', 'field')
                ->orderBy('label')
                ->get();
            $r = $this->exploite($actions);
            $categorie = $r[0];
            $values = $r[1];
            $fields = $r[2];
            $chart = \Chart::title([
                'text' => 'Voting ballon d`or 2018',
            ])
                ->chart([
                    'type' => 'line', // pie , columnt ect
                    'renderTo' => 'chart1', // render the chart into your div with id
                ])
                ->subtitle([
                    'text' => 'This Subtitle',
                ])
                ->colors([
                    '#0c2959'
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
                        'formatter' => 'startJs:function(){return this.value + " (Footbal Player)"}:endJs',
                        // use 'startJs:yourjavasscripthere:endJs'
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
                            // 'color' => '#0c2959',
                        ],
                    ]
                )
                ->display();


            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        $chart = $this->createPie('Graphe vide en ' . $date, $nom_graphe);

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

        if (count(get_object_vars($data[0])) == 2) {
            $keys = $values = [];
            foreach ($data as $key => $value) {
                array_push($values, $value->nb);
                array_push($keys, ucfirst($value->label));
            }
            return [$keys, $values];
        }

        $keys = $values = $fields = [];
        foreach ($data as $key => $value) {
            array_push($values, $value->nb);
            array_push($keys, ucfirst($value->label));
            array_push($fields, ucfirst($value->field));
        }
        return [$keys, $values, $fields];

    }

}
