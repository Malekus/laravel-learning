<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Personne extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->date_naissance,
            'sexe' => $this->sexe,
            'enfant' => $this->enfant,
            'csp' => $this->csp,
            'categorie' => $this->categorie,
            'nationalite' => $this->nationalite,
            'logement' => $this->logement,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'adresse' => $this->adresse,
            'code_postale' => $this->code_postale,
            'ville' => $this->ville,
            'prioritaire' => $this->prioritaire,
            'matricule_caf' => $this->matricule_caf,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at
        ];
    }
}
