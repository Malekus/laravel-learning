<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    protected $fillable = ['*'];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $model->probleme->updated_at = new Carbon('now');
            $model->probleme->save();
        });

        self::updated(function ($model) {
            $model->probleme->updated_at = new Carbon('now');
            $model->probleme->save();
        });
    }

    public function probleme()
    {
        return $this->belongsTo('App\Probleme');
    }

    public function action()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function complement()
    {
        return $this->belongsTo('App\Configuration');
    }
}
