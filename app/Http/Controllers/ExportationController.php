<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class ExportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('search') == null) {
            $dateNow = \Carbon\Carbon::now()->format('Y');
            return view('exportation.index', compact('dateNow'));
        }

        $dateNow = $request->get('search');
        return view('exportation.index', compact('dateNow'));
    }


    public function ajaxModel($date, $model){

        if($date == null)  $date = \Carbon\Carbon::now()->format('Y');

        if($model == 'personne'){
            $personne = new Personne;
            $models = Personne::where('updated_at', 'like', '%'.$date.'%')->select(array_diff($personne->getFillable(), array('nom','prenom')))->get();
            $categories = array_diff($personne->getFillable(), array('nom','prenom'));
            foreach ($categories as $key => $value){
                if($value == 'id') continue;
                if(strpos($value, '_id') !== false) {
                    $value = str_replace("_id", "", $value);
                    $categories[$key] = $value;
                }
                if(strpos($value, '_') !== false) $categories[$key] = str_replace("_", " ", $value);
                $categories[$key] = ucfirst($categories[$key]);
            }
            return view('exportation.table', compact(['models', 'categories']));
        }
        return null;
    }
}
