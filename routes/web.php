<?php

use Illuminate\Support\Facades\Route;
// use
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

Route::get('/',[App\Http\Controllers\ClienteController::class, 'listarClientes'])->name('clientes');
Route::get('/add',[App\Http\Controllers\ClienteController::class, 'create'])->name('addCliente');
Route::post('/add',[App\Http\Controllers\ClienteController::class, 'store'])->name('salvar');
Route::delete('/delete/{id}',[App\Http\Controllers\ClienteController::class, 'destroy'])->name('deletar');
Route::get('/edit/{id?}',[App\Http\Controllers\ClienteController::class, 'edit'])->name('edit');
Route::put('/edit',[App\Http\Controllers\ClienteController::class, 'update'])->name('atualizar');
