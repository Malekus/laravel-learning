<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Personne;
use App\Probleme;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        //$config = Configuration::champs('Problème','Problème','libelle');
        $config = Configuration::find(5);
        $personne = Personne::find(1);
        $config2 = Configuration::where('libelle', 'HLM')->get();
        $config->logement()->each(function ($pers){
            $pers->logement()->dissociate();
        });
        return view('test.index', compact(['config', 'personne']));
    }

    public function form(Request $request)
    {
        dd($request->all());
        return redirect(route('test.index'));
    }
}
