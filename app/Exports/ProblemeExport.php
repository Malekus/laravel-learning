<?php

namespace App\Exports;

use App\Http\Resources\ProblemeResource;
use App\Probleme;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProblemeExport implements FromCollection, WithHeadings
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
        $model = new Probleme();
        $a = array();
        foreach ($model->getFillable() as $key => $value) {
            if (in_array($value, ['personne', 'partenaire', 'categorie', 'type', 'accompagnement'])) {
                array_push($a, $value . "_id");
            } else {
                array_push($a, $value);
            }
        }
        return ProblemeResource::collection(Probleme::where('updated_at', 'like', '%' . $this->date . '%')->get());
    }

    public function headings(): array
    {
        return [
            'idProbleme',
            'Résolu',
            'Date Problème',
            'Personne',
            'Partenaire',
            'Catégorie',
            'Type',
            'Accompagnement',
            'Créé le',
            'Dernière mise à jour'
        ];
    }
}
