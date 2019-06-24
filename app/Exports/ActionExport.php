<?php

namespace App\Exports;

use App\Action;
use App\Http\Resources\ActionResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActionExport implements FromCollection, WithHeadings
{
    public function __construct($date = null)
    {
        if ($date == null)
            $this->date = \Carbon\Carbon::now()->format('Y');
        else
            $this->date = $date;
    }

    public function collection()
    {
        $model = new Action();
        $a = array();
        foreach ($model->getFillable() as $key => $value) {
            if (in_array($value, ['probleme', 'action', 'complement'])) {
                array_push($a, $value . "_id");
            } else {
                array_push($a, $value);
            }
        }

        return ActionResource::collection(Action::where('updated_at', 'like', '%' . $this->date . '%')->get());

    }

    public function headings(): array
    {
        return [
            'idRendezVous',
            'Déplacement',
            'Durée',
            'Date RendezVous',
            'Information',
            'Droit Ouvert',
            'Maintien Droit',
            'Conflit',
            'Perdu de Vue',
            'Judiciarisation',
            'Avancement',
            'Problème',
            'Action',
            'Complément',
            'Créé le',
            'Dernière mise à jour'
        ];
    }
}
