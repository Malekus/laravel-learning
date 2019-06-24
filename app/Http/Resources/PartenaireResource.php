<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartenaireResource extends JsonResource
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
            'sexe' => $this->sexe ?: 'null',
            'structure' => $this->structure ? $this->structure->libelle : 'null',
            'type' => $this->type ? $this->type->libelle : 'null',
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'update_at' => \Carbon\Carbon::parse($this->update_at)->format('d/m/Y')
        ];
    }
}
