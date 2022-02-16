<?php

namespace App\Http\Controllers;

use App\Models\Instalaciones;
use App\Exports\InstalacionExport;
use Illuminate\Http\Request;
use App\Models\Instalacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class InstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Instalacion::orderBy('nombre_insta')->get();
        return view('/instalaciones', ['instalacion' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nombre_insta'=>['required', 'string', 'min:3', 'max:255'],
            'direccion'=>['required', 'string', 'min: 3', 'max:255'],
            'dotacion'=>['required', 'Integer']
        ]);


        $query = DB::table('instalacions')->insert([
                'id' =>  random_int(1, 100), 
                'nombre_insta' => $request->input('nombre_insta'),
                'Direccion' => $request->input('direccion'),
                'Dotacion' => $request->input('dotacion')
        ]);

        return redirect()->intended('/instalaciones');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function export()
    {
        return Excel::download(new InstalacionExport, 'instalaciones.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_insta'=>['required', 'string'],
            'direccion'=>['required', 'string'],
            'dotacion'=>['required', 'Integer']
        ]);

        $query = DB::table('instalacions')->where('id', $id)->update([
            'nombre_insta' => $request->input('nombre_insta'),
            'Direccion' => $request->input('direccion'),
            'Dotacion' => $request->input('dotacion')
        ]);

        return redirect('/instalaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('instalacions')->where('id', $id)->delete();

        return redirect('/instalaciones');
    }
}
