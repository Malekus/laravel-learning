<?php

namespace App\Http\Controllers;

use App\Probleme;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        //$config = Configuration::champs('Problème','Problème','libelle');
        $config = ["Couple" => ["Tension" => "Tension", "Violence" => "Violence"],
            "Enfant" => ["CAF" => "CAF", "Formation" => "Formation", "ASE" => "ASE", "PPJ" => "PPJ"]];
        return view('test.index', compact('config'));
    }

    public function form(Request $request)
    {
        dd($request->all());
        return redirect(route('test.index'));
    }
}
