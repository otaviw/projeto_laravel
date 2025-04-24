<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\KeepinhoController;
use Illuminate\Support\Facades\Route;


//testes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/teste/{valor}', function ($valor) {
    return "voce digitou: {$valor}";
});

Route::get('/soma/{valor1}/{valor2}', function ($valor1, $valor2) {
    $soma = $valor1 + $valor2;
    return "A sua soma é: {$soma}";
});

//calculos
Route::prefix('/calc')->group(function () {
    Route::get('/somar/{x}/{y}', [CalculosController::class,'somar']);
    Route::get('/subtrair/{x}/{y}', [CalculosController::class,'subtrair']);
    Route::get('/multiplicar/{x}/{y}', [CalculosController::class,'multiplicar']);
    Route::get('/dividir/{x}/{y}', [CalculosController::class,'dividir']);
    Route::get('/quadrado/{x}', [CalculosController::class,'quadrado']);
});

//Keepinho
Route::prefix('/keep')->group(function () {
    Route::get('/', [KeepinhoController::class,'index']);
});