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
})->name('welcome');

Auth::routes();

Route::post('/login', 'Auth\LoginController@logar');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/registrar', 'UsuarioController@registrar')->name('registrar');
Route::get('/reenviar-email-confirmacao/{id?}', 'UsuarioController@enviarEmailConfirmacao')->name('reenviar-email-confirmacao');
Route::post('/confirmar-email', 'UsuarioController@confirmarEmail')->name('confirmar-email-post');
Route::get('/confirmar-email/{codigo}/{idUsuario}', 'UsuarioController@confirmarEmail')->name('confirmar-email-get');
Route::post('/registrar', 'UsuarioController@efetivarRegistro')->name('efetivarRegistro');

Route::get('/home', 'HomeController@index')->name('home');



