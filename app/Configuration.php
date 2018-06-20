<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $table = 'configuration';

    public function scopeIndexConfig($query, $categorie){
        return $query
            ->select('id', 'nom', 'prenom', 'matricule_caf', 'updated_at');
    }
}
