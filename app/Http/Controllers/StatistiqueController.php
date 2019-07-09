<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        if ($date == null) $date = Carbon::now();

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

        if ($type == 'problemes') {
            $problemes = DB::table('problemes')
                ->join('configurations', 'categorie_id', '=', 'configurations.id')
                ->select(DB::raw('count(*) as nb, libelle as label'))// DB::raw('label, count(*) as nbSpe')
                ->groupBy('libelle')
                ->orderBy('libelle')
                ->get();
            $r = $this->exploite($problemes);
            $categorie = $r[0];
            $values = $r[1];
            $chart = $this->createChart('Nombre de problème en ' . $date, 'column', $nom_graphe, ['subtitle' => array_sum($values) . ' problèmes', 'categories' => $categorie, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => false], $categorie);
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
            $chart = $this->createChart('Nombre de rendez-vous en ' . $date, 'column', $nom_graphe, ['subtitle' => array_sum($values) . ' rendez-vous', 'categories' => $categorie, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => true]);
            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        if ($type == 'age') {
            $ages = DB::table('personnes')
                ->select(DB::raw('count(*) as nb, YEAR(CURRENT_DATE) - YEAR(date_naissance) as age'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('age')
                ->orderBy('age', 'desc')
                ->get();

            $categorie = [strval('-18 ans') => 0, '18-25 ans' => 0, '25-35 ans' => 0, '35-45 ans' => 0, '45-65 ans' => 0, '+65 ans' => 0];
            foreach ($ages as $age) {
                if ($age->age >= 65) {
                    $categorie['+65 ans'] = $categorie['+65 ans'] + $age->nb;
                } elseif ($age->age >= 45) {
                    $categorie['45-65 ans'] = $categorie['45-65 ans'] + $age->nb;
                } elseif ($age->age >= 35) {
                    $categorie['35-45 ans'] = $categorie['35-45 ans'] + $age->nb;
                } elseif ($age->age >= 25) {
                    $categorie['25-35 ans'] = $categorie['25-35 ans'] + $age->nb;
                } elseif ($age->age >= 18) {
                    $categorie['18-25 ans'] = $categorie['18-25 ans'] + $age->nb;
                } else {
                    $categorie['-18 ans'] = $categorie['-18 ans'] + $age->nb;
                }

            }

            $cat = array_keys($categorie);
            $values = array_values($categorie);

            $chart = $this->createChart('Nombre de personne par tranche d\'âge en ' . $date, 'column', $nom_graphe,
                ['categories' => $cat, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => true]);
            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        if ($type == 'rdv_courrier') {
            $rdv_courrier =
                DB::table('actions')
                    ->join('configurations', 'action_id', '=', 'configurations.id')
                    ->select([DB::raw('count(*) as nb'), DB::raw('(select libelle from configurations where action_id = id) as label')])
                    ->whereIn('action_id', function ($query) {
                        $query->select('id')->from('configurations')->where('champ', 'Action')->where('libelle', 'like', '%courrier%');
                    })
                    ->groupBy('label')
                    ->get();

            $r = $this->exploite($rdv_courrier);
            $categorie = $r[0];
            $values = $r[1];
            $chart = $this->createChart('Nombre de rendez-vous en ' . $date, 'column', $nom_graphe, ['categories' => $categorie, 'data' => $values, 'nameLegend' => 'Nombre de personne', 'dataLabels' => true]);
            return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => $chart]);
        }

        if( $type == "sexeWithDomain"){
            return view('statistique.chart', ['idChart' => $nom_graphe]);
        }


        $chart = $this->createPie('Graphe vide en ' . $date, $nom_graphe);
        return view('statistique.chart', ['idChart' => $nom_graphe, 'chart' => [$chart]]);
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

    private function createChart($titre_graphe, $type_graphe, $nom_graphe, $options = [], $categorie = null)
    {
        $chart = \Chart::title([
            'text' => $titre_graphe,
        ])
            ->subtitle([
                'text' =>  $options['subtitle'] ?? null
            ])
            ->chart([
                'type' => $type_graphe,
                'renderTo' => $nom_graphe,
            ])
            ->xaxis([
                'categories' => $categorie ? $categorie : $options['categories'],
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


}


/*
select count(*), (select libelle from configurations where id = probleme_id), (select libelle from configurations where id = action_id)
from actions where action_id in (select id from configurations where libelle like '%courrier%' and champ = 'Action')
group by probleme_id


*/