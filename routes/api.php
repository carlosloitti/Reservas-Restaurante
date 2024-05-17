<?php

use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\MenuController;
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
Route::post('/menus' , [ClienteController::class, 'store'])->name('menus');
Route::get('/menus/create' , [ClienteController::class, 'create'])->name('menus');
Route::delete('/menus/{menu}' , [ClienteController::class, 'destroy'])->name('menus');
Route::put('/menus/{menu}' , [ClienteController::class, 'update'])->name('menus');
Route::get('/menus/{menu}/edit' , [ClienteController::class, 'edit'])->name('menus');