<?php

namespace App;

use Carbon\Carbon;
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
        'matricule_caf'
    ];


    protected $table = 'personne';

    public function problemes()
    {
        return $this->hasMany('App\Probleme');
    }

    public function logement()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function csp()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Configuration');
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($personne) {
            $personne->problemes()->delete();
        });
    }

    public function scopeIndex($query){
        return $query
            ->select('id', 'nom', 'prenom', 'matricule_caf', 'updated_at');
    }

    public function setDateNaissanceAttribute($value){
        if($value instanceof string){
            $date = Carbon::createFromFormat('d/m/Y',$value);
            $this->attributes['date_naissance'] = $date;
        }
        $this->attributes['date_naissance'] = $value;
    }

    public function setNull()
    {
        $this->logement_id = null;
    }

}
