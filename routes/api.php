<?php

use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\MenuController;
use App\Http\Controllers\api\MesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/clientes' , [ClienteController::class, 'index'])->name('clientes');
Route::post('/clientes' , [ClienteController::class, 'store'])->name('clientes');
Route::get('/clientes/create' , [ClienteController::class, 'create'])->name('clientes');
Route::delete('/clientes/{cliente}' , [ClienteController::class, 'destroy'])->name('clientes');
Route::put('/clientes/{cliente}' , [ClienteController::class, 'update'])->name('clientes');
Route::get('/clientes/{cliente}/edit' , [ClienteController::class, 'edit'])->name('clientes');

Route::get('/menus' , [MenuController::class, 'index'])->name('menus');
Route::post('/menus' , [MenuController::class, 'store'])->name('menus');
Route::get('/menus/create' , [MenuController::class, 'create'])->name('menus');
Route::delete('/menus/{menu}' , [MenuController::class, 'destroy'])->name('menus');
Route::put('/menus/{menu}' , [MenuController::class, 'update'])->name('menus');
Route::get('/menus/{menu}/edit' , [MenuController::class, 'edit'])->name('menus');


Route::get('/mesas' , [MesaController::class, 'index'])->name('mesas');
Route::post('/mesas' , [MesaController::class, 'store'])->name('mesas');
Route::get('/mesas/create' , [MesaController::class, 'create'])->name('mesas');
Route::delete('/mesas/{mesa}' , [MesaController::class, 'destroy'])->name('mesas');
Route::put('/mesas/{mesa}' , [MesaController::class, 'update'])->name('mesas');
Route::get('/mesas/{mesa}/edit' , [MesaController::class, 'edit'])->name('mesas');