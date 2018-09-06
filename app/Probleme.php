<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{

    protected $table = 'probleme';

    protected $fillable = [
        'personne_id',
        'resolu'
    ];

    public function personne()
    {
        return $this->belongsTo('App\Personne');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function type()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function accompagnement()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function actions()
    {
        return $this->hasMany('App\Action');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($probleme) {
            $probleme->actions()->delete();
        });
    }
}
