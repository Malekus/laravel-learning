<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'deplacement' => $this->deplacement ? '1' : '0',
            'duree' => $this->duree ?: 'null',
            'dateAction' => $this->dateAction ? '1' : '0',
            'information' => $this->information ? '1' : '0',
            'droitOuvert' => $this->droitOuvert ? '1' : '0',
            'maintienDroit' => $this->maintienDroit ? '1' : '0',
            'conflit' => $this->conflit ? '1' : '0',
            'perduDeVue' => $this->perduDeVue ? '1' : '0',
            'judiciarisation' => $this->judiciarisation ? '1' : '0',
            'avancement' => $this->avancement ?: 'null',
            'probleme' => $this->probleme ? $this->probleme->id : 'null',
            'action' => $this->action ? $this->action->libelle : 'null',
            'complement' => $this->complement ? $this->complement->libelle : 'null',
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'update_at' => \Carbon\Carbon::parse($this->update_at)->format('d/m/Y')
        ];
    }
}
