<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListeCafResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dateCaf' => $this->dateCaf,
            'motif' => $this->motif ? $this->motif->libelle : 'null',
            'personne' => $this->personne ? $this->personne->id : 'null',
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'update_at' => \Carbon\Carbon::parse($this->update_at)->format('d/m/Y')
        ];
    }
}
