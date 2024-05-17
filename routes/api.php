<?php

use App\Http\Controllers\api\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/clientes' , [ClienteController::class, 'index'])->name('clientes');