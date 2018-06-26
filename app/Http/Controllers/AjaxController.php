<?php

namespace App\Http\Controllers;

use App\Configuration;

class AjaxController extends Controller
{
    public static function configTab($categorie, $type)
    {
        $configurations = Configuration::where('categorie', $categorie)
            ->where('type', $type)
            ->get();
        return view('ajax.configTab', compact('configurations'));

    }
}
