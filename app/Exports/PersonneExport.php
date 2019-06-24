<?php

namespace App\Exports;

use App\Http\Resources\PersonneResource as PersonneResource;
use App\Personne;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonneExport implements FromCollection, WithHeadings
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
        $personne = new Personne();
        $a = array();
        foreach ($personne->getFillable() as $key => $value) {
            if (in_array($value, ['csp', 'logement', 'categorie'])) {
                array_push($a, $value . "_id");
            } else {
                array_push($a, $value);
            }
        }
        return PersonneResource::collection(Personne::where('updated_at', 'like', '%' . $this->date . '%')->get()); //;
    }

    public function headings(): array
    {
        return [
            'idPersonne',
            'Date Naissance',
            'Sexe',
            'Enfant',
            'Csp',
            'Catégorie',
            'Nationalité',
            'Logement',
            'Scolarite',
            'Situation',
            'Téléphone',
            'Email',
            'Adresse',
            'Code Postale',
            'Ville',
            'Quartier Prioritaire',
            'Matricule Caf',
            'Créé le',
            'Dernière mise à jour'
        ];
    }
}
