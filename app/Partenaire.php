<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $table = 'partenaires';

    public function structure()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function type()
    {
        return $this->belongsTo('App\Configuration');
    }

}
