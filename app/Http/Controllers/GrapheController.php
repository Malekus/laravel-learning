<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GrapheController extends Controller
{
    public function grapheTest()
    {
        $chart = 'toto';
        return view('graphe.index', ['graphe' => $chart]);
    }

    public function graphe($date, $type = null)
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
            $categories = array_values($r[0]);
            $values = $r[1];

            return view('graphe.chart',
                ['idChart' => $nom_graphe,
                    'type' => 'column',
                    'categories' => $categories,
                    'values' => $values,
                    'titre' => "Nombre de personne en " . $date]);
        }

        return null;

    }


    public function makeChart($date, $type = null)
    {
        if ($date == null) $date = Carbon::now();
        $idGraphe = $type . 'Chart';

        if ($type == 'sexe') {
            $personnes = DB::table('personnes')
                ->select(DB::raw('count(*) as nb, sexe as label'))
                ->where('updated_at', 'like', '%' . $date . '%')
                ->groupBy('sexe')
                ->orderBy('sexe')
                ->get();
            $r = $this->exploite($personnes);
            $categories = array_values($r[0]);
            $values = $r[1];

            $chart = "Highcharts.chart('".$idGraphe."', {
                        chart: {
                            type: 'column',
                            events: {
                                render: function() {
                                  let series = this.series
                                  let sum = 0
                                  for(let i = 0; i < series.length; i++) {
                                    if(series[i].visible){
                                      for(let j = 0; j < series[i].data.length; j++) {
                                        sum += series[i].data[j].y
                                      }
                                    }
                                  }
                                this.setTitle(false, {text: sum + ' personnes'}, false) 
                                }
                              }
                        },
                        title: {
                            text: 'Nombre de personne en ". $date ."'
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Nombre de personne'
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        
                        series: [{
                            name: '". $categories[0] ."',
                            data: [{name: '". $categories[0] ."', y:". $values[0] ."}],
                        }, {
                            name: '". $categories[1] ."',
                            data: [{name: '". $categories[1] ."', y:". $values[1] ."}],

                        }],
                        
                        credits: { enabled: false },
                        tooltip: { enabled: false }
                        
                        });";
            return view('graphe.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if ($type == 'probleme') {
            $problemes = DB::table('problemes')
                ->join('configurations', 'categorie_id', '=', 'configurations.id')
                ->select(DB::raw('count(*) as nb, libelle as label'))// DB::raw('label, count(*) as nbSpe')
                ->where('problemes.updated_at', 'like', '%' . $date . '%')
                ->groupBy('libelle')
                ->orderBy('libelle')
                ->get();

            $r = $this->exploite($problemes);
            $categories = $r[0];
            $values = $r[1];


            $series = "";

            foreach($categories as $key => $value){
                $series.= "{ name: '$value', data: [{name: '$value', y:$values[$key], x:$key}] },";
            }


            $chart = "var breaksProbleme = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                            render: function() {
                              let series = this.series
                              let sum = 0
                              for(let i = 0; i < series.length; i++) {
                                if(series[i].visible){
                                  for(let j = 0; j < series[i].data.length; j++) {
                                    sum += series[i].data[j].y
                                  }
                                }
                              }
                            this.setTitle(false, {text: sum + ' problèmes'}, false) 
                            }
                          }
                        },
                        title: {
                            text: 'Nombre de problème en ". $date ."',
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            
                            title: {
                                text: 'Nombre de problème'
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(breaksProbleme.has(this.xData[0])) {
                                        breaksProbleme.delete(this.xData[0])
                                      }
                                      else {
                                        breaksProbleme.set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... breaksProbleme.values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        series: [
                            ". $series ."
                        ],
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";

            return view('graphe.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if ($type == 'action') {
            $actions = DB::table('actions')
                ->select(DB::raw('count(actions.id) as nb, (select libelle from configurations where id = action_id) as label'))
                ->where('actions.updated_at', 'like', '%' . $date . '%')
                ->groupBy('label')
                ->orderBy('label')
                ->get();

            $r = $this->exploite($actions);
            $categories = $r[0];
            $values = $r[1];

            $series = "";
            foreach($categories as $key => $value){
                $series.= "{ name: '$value', data: [{name: '$value', y:$values[$key], x:$key}] },";
            }

            $chart = "var breaksAction = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                            render: function() {
                              let series = this.series
                              let sum = 0
                              for(let i = 0; i < series.length; i++) {
                                if(series[i].visible){
                                  for(let j = 0; j < series[i].data.length; j++) {
                                    sum += series[i].data[j].y
                                  }
                                }
                              }
                            this.setTitle(false, {text: sum + ' rendez-vous'}, false) 
                            }
                          }
                        },
                        title: {
                            text: 'Nombre de rendez-vous en ". $date ."'
                        },
                        subtitle: {
                            text: '".array_sum($values)." rendez-vous'
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Nombre de rendez-vous'
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(breaksAction.has(this.xData[0])) {
                                        breaksAction.delete(this.xData[0])
                                      }
                                      else {
                                        breaksAction.set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      
                                      this.chart.xAxis[0].update({
                                        breaks: [... breaksAction.values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        
                        series: [
                            ". $series ."
                        ],
                        
                        credits: { enabled: false },
                        //legend: { enabled: false },
                        tooltip: { enabled: false },
                        });";

            return view('graphe.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
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

            $categories = array_keys($categorie);
            $values = array_values($categorie);

            $series = "";
            foreach($categories as $key => $value){
                $series.= "{ name: '$value', data: [{name: '$value', y:$values[$key], x:$key}] },";
            }

            $chart = "var breaksAge = new Map();\n    Highcharts.chart('" . $idGraphe . "', {
                        chart: {
                            type: 'column',
                            events: {
                                render: function() {
                                  let series = this.series
                                  let sum = 0
                                  for(let i = 0; i < series.length; i++) {
                                    if(series[i].visible){
                                      for(let j = 0; j < series[i].data.length; j++) {
                                        sum += series[i].data[j].y
                                      }
                                    }
                                  }
                                  this.setTitle(false, {text: sum + ' personnes'}, false) 
                                }
                            }
                        },
                        title: {
                            text: 'Nombre de personne par tranche d\'âge en ". $date ."'
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Nombre de personnes'
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(breaksAge.has(this.xData[0])) {
                                        breaksAge.delete(this.xData[0])
                                      }
                                      else {
                                        breaksAge.set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... breaksAge.values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        
                        series: [
                            ". $series ."
                        ],
                        
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";

            return view('graphe.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if ($type == 'rdvCourrier') {
            $rdv_courrier =
                DB::table('actions')
                    ->join('configurations', 'action_id', '=', 'configurations.id')
                    ->select([DB::raw('count(*) as nb'), DB::raw('(select libelle from configurations where action_id = id) as label')])
                    ->whereIn('action_id', function ($query) {
                        $query->select('id')->from('configurations')->where('champ', 'Action')->where('libelle', 'like', '%courrier%');
                    })
                    ->where('actions.updated_at', 'like', '%' . $date . '%')
                    ->groupBy('label')
                    ->get();

            $r = $this->exploite($rdv_courrier);
            $categories = $r[0];
            $values = $r[1];


            $series = "";
            foreach($categories as $key => $value){
                $series.= "{ name: '$value', data: [{name: '$value', y:$values[$key], x:$key}] },";
            }

            $chart = "var breaksRdvCourrier = new Map();\n    Highcharts.chart('".$idGraphe."', {
                        chart: {
                            type: 'column',
                            events: {
                                render: function() {
                                  let series = this.series
                                  let sum = 0
                                  for(let i = 0; i < series.length; i++) {
                                    if(series[i].visible){
                                      for(let j = 0; j < series[i].data.length; j++) {
                                        sum += series[i].data[j].y
                                      }
                                    }
                                  }
                                  this.setTitle(false, {text: sum + ((sum != 1) ? ' courriers' : ' courrier')}, false) 
                                }
                            }
                        },
                        title: {
                            text: 'Nombre de courrier en ". $date ."'
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Nombre de courrier'
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(breaksRdvCourrier.has(this.xData[0])) {
                                            breaksRdvCourrier.delete(this.xData[0])
                                      }
                                      else {
                                        breaksRdvCourrier.set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... breaksRdvCourrier.values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        
                        series: [
                            ". $series ."
                        ],
                        
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";


            return view('graphe.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }

        if ($type == 'nbAccompagnement') {
            $nbAccompagnement =
                DB::table('actions')
                    ->join('configurations', 'action_id', '=', 'configurations.id')
                    ->select([DB::raw('count(*) as nb'), DB::raw('(select libelle from configurations where id = complement_id) as label')])
                    ->where('actions.updated_at', 'like', '%' . $date . '%')
                    ->groupBy('label')
                    ->get();

            $r = $this->exploite($nbAccompagnement);
            $categories = $r[0];
            $values = $r[1];

            $series = "";
            foreach($categories as $key => $value){
                $series.= "{ name: '$value', data: [{name: '$value', y:$values[$key], x:$key}] },";
            }

            $chart = "var breaksNbAccompagnement = new Map();\n    Highcharts.chart('".$idGraphe."', {
                        chart: {
                            type: 'column',
                            events: {
                                render: function() {
                                  let series = this.series
                                  let sum = 0
                                  for(let i = 0; i < series.length; i++) {
                                    if(series[i].visible){
                                      for(let j = 0; j < series[i].data.length; j++) {
                                        sum += series[i].data[j].y
                                      }
                                    }
                                  }
                                  this.setTitle(false, {text: sum + ((sum != 1) ? ' accompagnements' : ' accompagnement')}, false) 
                                }
                            }
                        },
                        title: {
                            text: 'Nombre d\'accompagnement en ". $date ."'
                        },
                        xAxis: {
                           type: 'category',
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Nombre d\'accompagnement'
                            }
                        },
                        plotOptions: {
                            column: {
                                grouping: false,
                                pointPadding: 0.2,
                                borderWidth: 0,
                                events: {
                                    legendItemClick: function() {
                                        if(breaksNbAccompagnement.has(this.xData[0])) {
                                            breaksNbAccompagnement.delete(this.xData[0])
                                      }
                                      else {
                                        breaksNbAccompagnement.set(this.xData[0], {from: this.xData[0] - 0.5,to: this.xData[0] + 0.5,breakSize: 0})
                                      }
                                      this.chart.xAxis[0].update({
                                        breaks: [... breaksNbAccompagnement.values()]
                                      });
                                    }
      							}
                            },
                            series: {
                                dataLabels: { enabled: true }
                            }
                        },
                        
                        series: [
                            ". $series ."
                        ],
                        
                        credits: { enabled: false },
                        tooltip: { enabled: false },
                        });";


            return view('graphe.makeChart', ['idGraphe' => $idGraphe, 'chart' => $chart]);
        }
        return "";
    }

    private function exploite($data)
    {

        if (count(get_object_vars($data[0])) == 2) {
            $keys = $values = [];
            foreach ($data as $key => $value) {
                array_push($values, $value->nb);
                array_push($keys, addslashes(ucfirst($value->label)));
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

/*

 xAxis: {
                            categories: ['". implode('\', \'', $categories) ."'],

                        },


                        series: [{
                            data: [84, 51],
                        }],

                        series: [{
                            name: '". $categories[0] ."',
                            data: [". $values[0] ."]

                        }, {
                            name: '". $categories[1] ."',
                            data: [". $values[1] ."]

                        }]



                            labels: {enabled: true },
                            title: { text: null }
 */
