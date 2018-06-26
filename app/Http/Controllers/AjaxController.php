<?php

namespace App\Http\Controllers;

use App\Configuration;

class AjaxController extends Controller
{
    public static function configTab($categorie, $type)
    {
        $configurations = Configuration::where('categorie', $categorie)
            ->where('type', $type)
            ->orderBy('updated_at', 'desc')
            ->get();
        $nameTab = $categorie.$type;
        return view('ajax.configTab', compact(['configurations', 'nameTab']));

    }
}


