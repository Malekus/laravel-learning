<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{

    protected $table = 'personne';

    public function problemes()
    {
        return $this->hasMany('App\Probleme', 'probleme_id');
    }
}
