<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $table = 'configuration';

    protected $fillable = [
        'categorie',
        'type',
        'libelle',
        'libelle2'
    ];

    public function scopeField($query, $categorie, $type)
    {
        $row = $query
            ->select($type)
            ->where('categorie', $categorie)
            ->groupBy($type)
            ->get()
            ->toArray();
        $tab = [];
        foreach ($row as $key => $line) {
            $tab[$line[$type]] = $line[$type];
        }
        return $tab;

    }

}
