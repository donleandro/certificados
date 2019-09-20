<?php

namespace App\Exports;

use App\Model\Eventos\Asistente;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsistentesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asistente::all();
    }
}
