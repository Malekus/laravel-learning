<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $table = 'configuration';

    protected $fillable = [
        'categorie',
        'champ',
        'libelle'
    ];

    public function scopeField($query, $categorie, $type)
    {
        $row = $query
            ->select('libelle, '.$type)
            ->where('categorie', $categorie)
            ->groupBy($type)
            ->get()
            ->toArray();
        $tab = [];
        foreach ($row as $key => $line) {
            $tab[$line[$type]] = $line[$type];
        }

        dd($tab);
        return $tab;
    }

    public function scopeChamps($query, $categorie, $champs, $col = null)
    {
        $row = $query
            ->select($col)
            ->where('categorie', $categorie)
            ->where('champ', $champs)
            ->groupBy($col)
            ->get()
            ->toArray();
        $tab = [];
        foreach ($row as $key => $line) {
            $tab[$line[$col]] = $line[$col];
        }
        return $tab;
    }

}
