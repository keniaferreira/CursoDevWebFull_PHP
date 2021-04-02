<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/contatos', [\App\Http\Controllers\ContatoController::class, 'showAll']);
Route::get('/contatos/{id}', [\App\Http\Controllers\ContatoController::class, 'show']);
Route::post('/contatos/cadastrar', [\App\Http\Controllers\ContatoController::class, 'store']);
Route::put('/contatos/editar/{id}', [\App\Http\Controllers\ContatoController::class, 'update']);
Route::delete('/contatos/deletar/{id}', [\App\Http\Controllers\ContatoController::class, 'destroy']);
