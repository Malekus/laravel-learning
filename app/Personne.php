<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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


    protected $table = 'personnes';

    public function problemes()
    {
        return $this->hasMany(Probleme::class);
        /*
            ->join('configurations as c1', 'c1.id', '=', 'problemes.categorie_id')
            ->join('configurations as c2', 'c2.id', '=', 'problemes.type_id')
            ->select(['problemes.*', 'c1.libelle as categorie', 'c2.libelle as type']); //, 'type.libelle']);
        */
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

    public function scolaire()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function situation()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function listeCaf()
    {
        return $this->hasMany(CafDate::class);
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


}
