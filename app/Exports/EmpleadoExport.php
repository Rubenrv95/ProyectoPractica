<?php

namespace App\Exports;

use App\Models\Empleado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmpleadoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('exports.empleados', [
            'empleados' => Empleado::get()
        ]);
    }

    public function collection()
    {
        return Empleado::all();
    }
}
