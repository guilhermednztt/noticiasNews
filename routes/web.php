<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\News;

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

/**
 * -----------------
 *        GET ROUTES 
 * -----------------
 */
Route::get('/login', function(){
    return view('login');
});

Route::get('/registro', function(){
    return view('register');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/materia', function(){
    return view('materia');
});

Route::get('/', [News::class, 'criarMateria']);

Route::get('/news', [News::class, 'criarMateria']);

Route::get('/sair', [Login::class, 'encerrarSessao']);

Route::get('/vermais', [News::class, 'verMais']);

Route::get('/materias/{id}', [News::class, 'exibirMateria']);


/**
 * ----------------
 *      POST ROUTES
 * ----------------
 */
Route::post('/acesso', [Login::class, 'validarAcesso']);

Route::post('/registrar', [Login::class, 'criarAcesso']);
