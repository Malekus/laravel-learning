<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{

    protected $table = 'problemes';

    protected $fillable = ['resolu', 'dateProbleme'];

    public function personne()
    {
        return $this->belongsTo('App\Personne');
    }

    public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
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

        self::deleting(function ($model) {
            $model->actions()->delete();
        });

        self::created(function ($model) {
            if ($model->personne){
                $model->personne->updated_at = new Carbon('now');
                $model->personne->save();
            }
            else {
                $model->partenaire->updated_at = new Carbon('now');
                $model->partenaire->save();
            }

        });

        self::updated(function ($model) {
            if ($model->personne){
                $model->personne->updated_at = new Carbon('now');
                $model->personne->save();
            }
            else {
                $model->partenaire->updated_at = new Carbon('now');
                $model->partenaire->save();
            }
        });
    }
}