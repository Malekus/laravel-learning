<?php

namespace App\Http\Controllers;


use App\Exports\ActionExport;
use App\Exports\ListeCafExport;
use App\Exports\PartenaireExport;
use App\Exports\PersonneExport;
use App\Exports\ProblemeExport;
use App\Partenaire;
use App\Personne;
use App\Action;
use App\CafDate;
use App\Probleme;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportationController extends Controller
{

    public function index(Request $request)
    {
        if ($request->get('search') == null) {
            $dateNow = \Carbon\Carbon::now()->format('Y');
            return view('exportation.index', compact('dateNow'));
        }

        $dateNow = $request->get('search');
        return view('exportation.index', compact('dateNow'));
    }


    public function ajaxModel($date, $model)
    {
        if ($date == null) $date = \Carbon\Carbon::now()->format('Y');

        if ($model == 'personne') {
            $models = Personne::where('updated_at', 'like', '%' . $date . '%')->take(5)->get();
            $categories = new PersonneExport();
            return view('exportation.tablePersonne', ['models' => $models, 'categories' => $categories->headings()]);
        }

        if ($model == 'partenaire') {
            $models = Partenaire::where('updated_at', 'like', '%' . $date . '%')->take(5)->get();
            $categories = new PartenaireExport();
            return view('exportation.tablePartenaire', ['models' => $models, 'categories' => $categories->headings()]);
        }

        if ($model == 'probleme') {
            $models = Probleme::where('updated_at', 'like', '%' . $date . '%')->take(5)->get();
            $categories = new ProblemeExport();
            return view('exportation.tableProbleme', ['models' => $models, 'categories' => $categories->headings()]);
        }

        if ($model == 'action') {
            $models = Action::where('updated_at', 'like', '%' . $date . '%')->take(5)->get();
            $categories = new ActionExport();
            return view('exportation.tableAction', ['models' => $models, 'categories' => $categories->headings()]);
        }

        if ($model == 'listeCaf') {
            $models = CafDate::where('updated_at', 'like', '%' . $date . '%')->take(5)->get();
            $categories = new ListeCafExport();
            return view('exportation.tableListCaf', ['models' => $models, 'categories' => $categories->headings()]);
        }
        return view('exportation.table');
    }

    public function exportExcel($dateNow = null, $model)
    {
        if ($dateNow == null) $dateNow = \Carbon\Carbon::now()->format('Y');
        if ($model == 'personne') return Excel::download(new PersonneExport($dateNow), 'personnes_' . $dateNow . '_.xlsx');
        if ($model == 'partenaire') return Excel::download(new PartenaireExport($dateNow), 'partenaires_' . $dateNow . '_.xlsx');
        if ($model == 'probleme') return Excel::download(new ProblemeExport($dateNow), 'problemes_' . $dateNow . '_.xlsx');
        if ($model == 'action') return Excel::download(new ActionExport($dateNow), 'rendez_vous_' . $dateNow . '_.xlsx');
        if ($model == 'listeCaf') return Excel::download(new ListeCafExport($dateNow), 'liste_cafs_' . $dateNow . '_.xlsx');
        return null;
    }

}
