<?php

namespace App\Exports;

use App\Http\Resources\PartenaireResource;
use App\Partenaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartenaireExport implements FromCollection, WithHeadings
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
        $model = new Partenaire();
        $a = array();
        foreach ($model->getFillable() as $key => $value) {
            if (in_array($value, ['type', 'structure'])) {
                array_push($a, $value . "_id");
            } else {
                array_push($a, $value);
            }
        }
        return PartenaireResource::collection(Partenaire::where('updated_at', 'like', '%' . $this->date . '%')->get());
    }

    public function headings(): array
    {
        return [
            'idPartenaire',
            'Sexe',
            'Structure',
            'Type',
            'Créé le',
            'Dernière mise à jour'
        ];
    }
}
