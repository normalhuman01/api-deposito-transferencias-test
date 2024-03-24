<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BalanceController;
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

Route::group(['prefix'=> '/conta'], function(){
    Route::get("/home", [AccountController::class, "index"])->name('conta.home');
    Route::put("/atualizar", [AccountController::class, "update"])->name('conta.atualizar');
    Route::post("/cadastro",[AccountController::class, "store"])->name('conta.cadastro');
    Route::get("/{id}", [AccountController::class, "show"])->name('conta.show');
    Route::delete("/{id}", [AccountController::class, "destroy"])->name('conta.del');
});

Route::group(['prefix'=> '/transacao'], function(){
    Route::put("/deposito",[BalanceController::class, "deposit"])->name('transacao.deposito');
    Route::post("/pagamento",[BalanceController::class, "payment"])->name('transacao.pagamento');
});