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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('contato')->group(function () {
	Route::get('/', [App\Http\Controllers\ContatoController::class, 'index']);
	Route::get('/cadastrar', [App\Http\Controllers\ContatoController::class, 'create']);
	Route::get('/editar/{id}', [App\Http\Controllers\ContatoController::class, 'edit']);
	Route::get('/deletar/{id}', [App\Http\Controllers\ContatoController::class, 'delete']);

});
