<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordGeneratorRequest;

class PasswordGeneratorController extends Controller
{
    //index
    public function index ()
    {
        return view("home");
    }

    //password generate
    public function passwordGenerate (PasswordGeneratorRequest $request)
    {
        $dados = $request->validated();
        
        $tamanho = $dados["tamanho"];
        $maiusculas = $dados["maiusculas"] ?? false;
        $minusculas = $dados["minusculas"] ?? false;
        $numeros = $dados["numeros"] ?? false;
        $simbolos = $dados["simbolos"] ?? false;
        $caracteresDisponiveis = "";
        $senha = "";

        if ($maiusculas){
            $caracteresDisponiveis .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }

        if ($minusculas){
            $caracteresDisponiveis .= "abcdefghijklmnopqrstuvwxyz";
        }

        if ($numeros){
            $caracteresDisponiveis .= "1234567890";
        }

        if ($simbolos){
            $caracteresDisponiveis .= "!@#$%&*()_+=?";
        }

        for ($i=0; $i < $tamanho; $i++) { 
            $num = random_int(0, strlen($caracteresDisponiveis) - 1);
            $senha .= $caracteresDisponiveis[$num];
        }

        
        return redirect()
        ->route("password.index")
        ->with([
            "success" => "A senha foi gerada com sucesso",
            "resultado" => $senha,
        ]);
    }
}
