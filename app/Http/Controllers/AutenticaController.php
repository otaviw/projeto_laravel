<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticarRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AutenticaController extends Controller
{
    public function index(){
        return view('autentica.index');
    }

    public function gravar(AutenticarRequest $request){

        User::create($request->all());
        return redirect()->route('autentica');
    }

    public function login (Request $request){

        if ($request->isMethod('POST')){
            if(Auth::attempt($request->only('email', 'password'))){
                return redirect()->route('autentica');
            }
        }

        return view("autentica.login");
    }
}
