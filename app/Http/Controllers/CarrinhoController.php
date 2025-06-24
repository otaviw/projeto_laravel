<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function adicionar($produtoId)
    {
        $produto = Produto::find($produtoId);
        if (!$produto) {
            return redirect()->route('carrinho')->with('error', 'Produto não encontrado.');
        }

        $carrinho = session()->get('carrinho', []);

        $carrinho[$produto->id] = [
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'descricao' => $produto->descricao,
            'image' => $produto->image,
        ];

        session(['carrinho' => $carrinho]);

        return redirect()->route('carrinho')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remover($produtoId)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produtoId])) {
            unset($carrinho[$produtoId]);
            session(['carrinho' => $carrinho]);
            return redirect()->route('carrinho')->with('success', 'Produto removido do carrinho!');
        }

        return redirect()->route('carrinho')->with('error', 'Produto não encontrado no carrinho.');
    }
}
