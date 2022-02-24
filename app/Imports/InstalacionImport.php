<?php

namespace App\Imports;

use App\Models\Instalacion;
use Maatwebsite\Excel\Concerns\ToModel;

class InstalacionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Instalacion([
            'nombre_insta' => $row[0],
            'Direccion' => $row[1],
            'Dotacion' => $row[2],
        ]);
    }
}
