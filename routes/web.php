<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstalacionController;
use App\Exports\EmpleadoExport;
use App\Exports\InstalacionExport;
use App\Exports\UserExport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function() {
    return view('home');
});

Auth::routes();
Route::post('/login', 'Auth\LoginController@login');
Route::get('/home', 'HomeController@index');

Route::post('registrar', 'UserController@create');
Route::resource('/usuarios', 'UserController');
Route::get('/usuarios_descarga', 'UserController@export');
Route::post('/usuarios/importar', 'UserController@store');

Route::resource('/instalaciones', 'InstalacionController');
Route::post('crear_insta', 'InstalacionController@create');
Route::get('/instalacion_descarga', 'InstalacionController@export');
Route::post('/instalaciones/importar', 'InstalacionController@store');

Route::resource('/empleados', 'EmpleadoController');
Route::post('crear_emp', 'EmpleadoController@create');
Route::get('/empleado_descarga', 'EmpleadoController@export');
Route::post('/empleados/importar', 'EmpleadoController@store');


Route::resource('/asistencia', 'FormularioController');
Route::post('/asistencia/descargar', 'FormularioController@store');

Route::resource('/reportes', 'ReportController');

Route::get('/logout', 'Auth\LoginController@logout');
