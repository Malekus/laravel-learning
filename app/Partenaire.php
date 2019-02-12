<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $table = 'partenaires';

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (!in_array($key, array('_method', '_token')))
                $this->$key = $value;
        }
    }

    public function structure()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function type()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function scopeIndex($query)
    {
        return $query
            ->select('id', 'nom', 'prenom', 'structure_id', 'updated_at')->orderBy('nom');
    }
}
