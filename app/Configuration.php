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

    public function scopeIndexConfig($query, $categorie){
        return $query
            ->select('id', 'nom', 'prenom', 'matricule_caf', 'updated_at');
    }
}
