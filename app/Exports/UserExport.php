<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View {
        return view('exports.users', [
            'usuarios' => User::get()
        ]);
    }

    public function collection()
    {
        return User::all();
    }
}
