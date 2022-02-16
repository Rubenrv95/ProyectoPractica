<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstalacionController;
use App\Exports\EmpleadoExport;
use App\Exports\InstalacionExport;

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
Route::get('/descargar_usuario', 'EmpleadoController@export');

Route::resource('/instalaciones', 'InstalacionController');
Route::post('crear_insta', 'InstalacionController@create');
Route::get('/descargar_instalacion', 'InstalacionController@export');

Route::resource('/empleados', 'EmpleadoController');
Route::post('crear_emp', 'EmpleadoController@create');
Route::get('/descargar_empleado', 'EmpleadoController@export');

Route::resource('/asistencia', 'FormularioController');
Route::post('/asistencia/descargar', 'FormularioController@store');

Route::resource('/reportes', 'ReportController');

Route::get('/logout', 'Auth\LoginController@logout');
