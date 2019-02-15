<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CafDate extends Model
{
    protected $table = 'cafDates';

    public function personne()
    {
        return $this->belongsTo('App\Personne');
    }

    public function motif()
    {
        return $this->belongsTo('App\Configuration');
    }
}
