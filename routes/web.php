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
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/cadastro', function () {
    return view('cadastro');
});
Route::get('/deposito', function () {
    return view('deposito');
});
Route::get('/transferencia', function () {
    return view('transferencia');
});
Route::get('/login', function () {
    return view('login');
});
