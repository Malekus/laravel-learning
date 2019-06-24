<?php

namespace App\Exports;

use App\CafDate;
use App\Http\Resources\ListeCafResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListeCafExport implements FromCollection, WithHeadings
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
        $model = new CafDate();
        $a = array();
        foreach ($model->getFillable() as $key => $value) {
            if (in_array($value, ['motif', 'personne'])) {
                array_push($a, $value . "_id");
            } else {
                array_push($a, $value);
            }
        }

        return ListeCafResource::collection(CafDate::where('updated_at', 'like', '%' . $this->date . '%')->get());

    }

    public function headings(): array
    {
        return [
            'idCafDate',
            'Date Caf',
            'Motif',
            'Personne',
            'Créé le',
            'Dernière mise à jour'
        ];
    }
}
