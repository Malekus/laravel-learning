<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $fillable = ['nom', 'prenom', 'date_naissance', 'sexe', 'enfant', 'nationalite', 'telephone', 'email', 'adresse', 'code_postale', 'ville', 'prioritaire', 'matricule_caf', 'origine'];

    protected $table = 'personnes';

    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($model) {
            $model->problemes()->delete();
        });
    }

    public function problemes()
    {
        return $this->hasMany(Probleme::class);
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

    public function scolarite()
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

    public function scopeIndex($query)
    {
        return $query
            ->select('id', 'nom', 'prenom', 'matricule_caf', 'updated_at');
    }

    public function setDateNaissanceAttribute($value)
    {
        if ($value instanceof string) {
            $date = Carbon::createFromFormat('d/m/Y', $value);
            $this->attributes['date_naissance'] = $date;
        }
        $this->attributes['date_naissance'] = $value;
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->columns, $value));
    }

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = ucfirst($value);
    }

    public function setPrenomAttribute($value)
    {
        $this->attributes['prenom'] = ucfirst($value);
    }

    public function setVilleAttribute($value)
    {
        $this->attributes['ville'] = ucfirst($value);
    }
}
