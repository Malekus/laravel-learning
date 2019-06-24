<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonneResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date_naissance' => $this->date_naissance,
            'sexe' => $this->sexe,
            'enfant' => $this->enfant ?: '0',
            'csp' => $this->csp ? $this->csp->libelle : 'null',
            'categorie' => $this->categorie ? $this->categorie->libelle : 'null',
            'nationalite' => $this->nationalite,
            'logement' => $this->logement ? $this->logement->libelle : 'null',
            'scolarite' => $this->scolarite ? $this->scolarite->libelle : 'null',
            'situation' => $this->situation ? $this->situation->libelle : 'null',
            'telephone' => $this->telephone ? '1' : '0',
            'email' => $this->email ? '1' : '0',
            'adresse' => $this->adresse ? '1' : '0',
            'code_postale' => $this->code_postale ?: 'null',
            'ville' => $this->ville ?: 'null',
            'prioritaire' => $this->prioritaire ? '1' : '0',
            'matricule_caf' => $this->matricule_caf ? '1' : '0',
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'update_at' => \Carbon\Carbon::parse($this->update_at)->format('d/m/Y')
        ];
    }
}
