<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CafDate extends Model
{
    protected $table = 'cafDates';


    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $model->personne->updated_at = new Carbon('now');
            $model->personne->save();
        });

        self::updated(function ($model) {
            $model->personne->updated_at = new Carbon('now');
            $model->personne->save();
        });
    }

    public function personne()
    {
        return $this->belongsTo('App\Personne');
    }

    public function motif()
    {
        return $this->belongsTo('App\Configuration');
    }

}
