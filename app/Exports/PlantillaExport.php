<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\UsuariosWeb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlantillaExport implements FromCollection
{
    public function collection()
    {
        return UsuariosWeb::all();
    }
}
