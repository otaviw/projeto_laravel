<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculosController extends Controller
{
    function somar($x, $y){
        return 'Soma: ' . $x + $y;
    }

    function subtrair($x, $y){
        return 'Subtração: ' . $x - $y;
    }

    function multiplicar($x, $y){
        return 'Multiplicação: ' . $x * $y;
    }

    function dividir($x, $y){
        return 'Divisão: ' . $x / $y;
    }

    function quadrado($x){
        return 'Quadrado: ' . $x * $x;
    }
}
