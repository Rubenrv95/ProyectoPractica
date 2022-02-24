<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;

class EmpleadoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleado([
            'nombre' => $row[0],
            'RUT' => $row[1],
            'email' => $row[2],
            'instalacion' => $row[3],
            'Cargo' => $row[4],
            'telefono' => $row[5],
        ]);
    }
}
