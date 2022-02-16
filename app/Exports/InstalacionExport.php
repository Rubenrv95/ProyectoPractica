<?php

namespace App\Exports;

use App\Models\Instalacion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InstalacionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('exports.instalaciones', [
            'instalaciones' => Instalacion::get()
        ]);
    }


    public function collection()
    {
        return Instalacion::all();
    }
}
