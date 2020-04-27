<?php

use Illuminate\Support\Facades\Route;

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
})->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 

Route::resource('hospital', 'HospitalController');
Route::resource('laboratorio', 'LaboratorioController');
Route::resource('medico', 'MedicoController');
Route::resource('diagnostico', 'DiagnosticoController');
Route::resource('sala', 'SalaController');
Route::resource('paciente', 'PacienteController');
Route::resource('detalle', 'DetalleController');
Route::resource('consulta', 'ConsultaController');
Route::resource('fecha', 'FechaController');


Route::resource('Admin/users','Admin\UserController')->middleware('can:administrar-usuarios');

Route::post('hospital/guardar', 'HospitalController@store');
Route::post('consulta/guardar', 'ConsultaController@store');
Route::post('detalle/guardar', 'DetalleController@store');
Route::post('diagnostico/guardar', 'DiagnosticoController@store');
Route::post('fecha/guardar', 'FechaController@store');
Route::post('laboratorio/guardar', 'LaboratorioController@store');
Route::post('medico/guardar', 'MedicoController@store');
Route::post('paciente/guardar', 'PacienteController@store');
Route::post('sala/guardar', 'SalaController@store');