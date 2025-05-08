<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestaurantesController extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();

        return view("restaurantes/index", [
            'restaurantes' => $restaurantes,
        ]);
    }

    public function adicionar(){
        return view("restaurantes/adicionar");
    }

    public function salvar(Request $request){
        Restaurante::create($request->all());

        return redirect()->route('restaurantes');
    }

    public function editar(Restaurante $restaurante, Request $request){

        if ($request->isMethod('put')){
            $restaurante = Restaurante::find($request->id);
            $restaurante->nome = $request->nome;
            $restaurante->tipo = $request->tipo;
            $restaurante->endereco = $request->endereco;
            $restaurante->telefone = $request->telefone;
            $restaurante->preco = $request->preco;
            $restaurante->save();

            return redirect()->route('restaurantes');
        }

        return view('restaurantes.editar', [
            'restaurante' => $restaurante,
        ]);
    }
}
