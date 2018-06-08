<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{


    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'enfant',
        'csp',
        'categorie',
        'nationalite',
        'logement',
        'telephone',
        'email',
        'adresse',
        'code_postale',
        'ville',
        'prioritaire',
        'matricule_caf'];


    protected $table = 'personne';

    public function problemes()
    {
        return $this->hasMany(Probleme::class);
    }

    public function scopePersonneEdit($query){
        return $query->where('enfant', 0)->get('nom', 'prenom');
    }

    public function scopeIndex($query){
        return $query
            ->select('id', 'nom', 'prenom', 'matricule_caf', 'updated_at');
    }
}
