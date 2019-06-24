<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProblemeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'resolu' => $this->resolu ? '1' : '0',
            'date_probleme' => $this->enfant ?: '0',
            'personne' => $this->personne ? $this->personne->id : 'null',
            'partenaire' => $this->partenaire ? $this->partenaire->id : 'null',
            'categorie' => $this->categorie ? $this->categorie->libelle : 'null',
            'type' => $this->type ? $this->type->libelle : 'null',
            'accompagnement' => $this->accompagnement ? $this->accompagnement->libelle : 'null',
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'update_at' => \Carbon\Carbon::parse($this->update_at)->format('d/m/Y')
        ];
    }
}
