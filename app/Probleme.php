<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{

    protected $table = 'probleme';

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
