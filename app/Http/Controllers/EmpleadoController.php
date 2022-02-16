<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Exports\EmpleadoExport;
use Illuminate\Http\Request;
use App\Models\Instalacion;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $excel;

    public function index()
    {
        //
        $data =Empleado::orderBy('nombre')->get();
        $insta= Instalacion::orderBy('nombre_insta')->get();
        return view('empleados')->with('empleado', $data)->with('insta', $insta);
    }

    public function _construct(Excel $excel) {
        $this->excel = $excel;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'max:255'],
            'RUT'=>['required', 'string', 'min:12'],
            'email'=>['required', 'string', 'email', 'max:255'],
            'telefono'=>['required', 'string', 'min: 3', 'max:12'],
        ]);


        $query = DB::table('empleados')->insert([ 
                'nombre' => $request->input('nombre'),
                'RUT' => $request->input('RUT'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'instalacion' => $request->input('instalacion'),
                'Cargo' => $request->input('cargo')
        ]);

        return redirect()->intended('/empleados');
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
        return Excel::download(new EmpleadoExport, 'empleados.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'max:255'],
            'RUT'=>['required', 'string', 'min:12'],
            'email'=>['required', 'string', 'email', 'max:255'],
            'telefono'=>['required', 'string', 'min: 3', 'max:12'],
        ]);

        $query = DB::table('empleados')->where('RUT', $id)->update([
            'nombre' => $request->input('nombre'),
            'RUT' => $request->input('RUT'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'instalacion' => $request->input('instalacion'),
            'Cargo' => $request->input('cargo')
        ]);

        return redirect('/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('empleados')->where('RUT', $id)->delete();

        return redirect('/empleados');
    }
}
