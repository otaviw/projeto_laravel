<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\KeepinhoController;
use App\Http\Controllers\RestaurantesController;
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
    Route::get('/', [KeepinhoController::class,'index'])->name('keep');
    Route::post('/gravar', [KeepinhoController::class,'gravar'])->name('keep.gravar');
    Route::get('/editar/{nota}', [KeepinhoController::class,'editar'])->name('keep.editar');
    Route::put('/editar', [KeepinhoController::class,'editar'])->name('keep.editarGravar');
    Route::delete('/apagar/{nota}', [KeepinhoController::class,'apagar'])->name('keep.apagar');
});

//Restaurantes
Route::prefix('/restaurantes')->group(function () {
    Route::get('/', [RestaurantesController::class,'index'])->name('restaurantes');
    Route::get('/adicionar', [RestaurantesController::class,'adicionar'])->name('restaurantes.adicionar');
    Route::post('/adicionar/salvar', [RestaurantesController::class,'salvar'])->name('restaurantes.salvar');
    Route::get('/editar/{restaurante}', [RestaurantesController::class,'editar'])->name('restaurantes.editar');
    Route::put('/editar', [RestaurantesController::class,'editar'])->name('restaurantes.editarSalvar');
    // Route::delete('/apagar/', [RestaurantesController::class,'apagar'])->name('keep.apagar');
});