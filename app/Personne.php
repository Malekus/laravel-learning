<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{


    protected $fillable = ['nom'];

    protected $table = 'personne';


    public function problemes()
    {
        return $this->hasMany(Probleme::class);
    }
}
