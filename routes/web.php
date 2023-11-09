<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\GuiaTransporteController;
use App\Http\Controllers\RemisionController;

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
//guias
Route::get('/guias', [GuiaTransporteController::class,'index'])->name('guia.index');
Route::get('/guias/createform', [GuiaTransporteController::class, 'createForm'])->name('guia.createform');
Route::post('/guias/create', [GuiaTransporteController::class, 'store'])->name('guia.create');
//Route::post('/guias', 'GuiaTransporteController@store')->name('guias.store');
//Route::get('/guias/{id}', 'GuiaTransporteController@show')->name('guias.show');
//Route::get('/guias/{id}/remisiones/create', 'GuiaTransporteController@createRemision')->name('guias.remisiones.create');
//remisiones
Route::get('/remisiones', [RemisionController::class, 'index'])->name('remision.index');
Route::get('/remisiones/createform', [RemisionController::class, 'createForm'])->name('remision.createform');
Route::post('/remisiones/create', [RemisionController::class, 'createRemision'])->name('remision.createRemision');
Route::get('/remisiones/editform/{remision}', [RemisionController::class, 'editForm'])->name('remision.editform');
Route::post('/remisiones/edit', [RemisionController::class, 'updateRemision'])->name('remision.updateRemision');
//Route::post('/remisiones/update', 'RemisionController@updateRemision')->name('remision.update');
//Route::get('/remisiones', 'RemisionController@index')->name('remision.index');
