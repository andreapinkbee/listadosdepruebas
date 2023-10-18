<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//facturas
Route::get('/facturas', [FacturaController::class,'index'])->name('factura.index');
Route::get('/facturas/createform', [FacturaController::class, 'createForm'])->name('factura.createform');
Route::post('/facturas/create', [FacturaController::class,'createFactura'])->name('factura.create');
//Route::post('/facturas/{factura}', [FacturaController::class,'store'])->name('factura.show');
//guia
Route::get('/guias', 'GuiaTransporteController@index')->name('guias.index');
Route::get('/guias/create', 'GuiaTransporteController@create')->name('guias.create');
Route::post('/guias', 'GuiaTransporteController@store')->name('guias.store');
Route::get('/guias/{id}', 'GuiaTransporteController@show')->name('guias.show');
Route::get('/guias/{id}/remisiones/create', 'GuiaTransporteController@createRemision')->name('guias.remisiones.create');
//remisiones
Route::post('/remisiones/create', 'RemisionController@createRemision')->name('remision.create');
Route::post('/remisiones/update', 'RemisionController@updateRemision')->name('remision.update');
Route::get('/remisiones', 'RemisionController@index')->name('remision.index');
