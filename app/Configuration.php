<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $table = 'configurations';

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


    public function accompagnement()
    {
        return $this->hasMany('App\Probleme');
    }

    public function logement()
    {
        return $this->hasMany('App\Personne', 'logement_id');
    }

    public function csp()
    {
        return $this->hasMany('App\Personne', 'csp_id');
    }

    public function scolaire()
    {
        return $this->hasMany('App\Personne', 'scolaire_id');
    }

    public function action()
    {
        return $this->hasMany('App\Action', 'action_id');
    }

    public function categorie()
    {
        return $this->hasMany('App\Personne', 'categorie_id');
    }

    public function dirigieVers()
    {
        return $this->hasMany('App\Action');
    }

    public function situation()
    {
        return $this->hasMany('App\Personne', 'situation_id');
    }

    public function structure()
    {
        return $this->hasMany('App\Personne');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($configuration) {


            switch ($configuration->champ) {
                case "Logement":
                    $configuration->logement()->each(function ($personne) {
                        $personne->logement()->dissociate();
                        $personne->save();
                    });
                    break;
                case "CSP":
                    $configuration->csp()->each(function ($personne) {
                        $personne->csp()->dissociate();
                        $personne->save();
                    });
                    break;
                case "Catégorie":
                    $configuration->categorie()->each(function ($personne) {
                        $personne->categorie()->dissociate();
                        $personne->save();
                    });
                    break;
                case "Niveau Scolaire":
                    $configuration->scolaire()->each(function ($personne) {
                        $personne->scolaire()->dissociate();
                        $personne->save();
                    });
                    break;

                case "Situation":
                    $configuration->situation()->each(function ($personne) {
                        $personne->situation()->dissociate();
                        $personne->save();
                    });
                    break;


                case "Action":
                    $configuration->action()->each(function ($action) {
                        $action->delete();
                    });
                    break;
            }

        });
    }
}
