<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImcRequest;
use Illuminate\Support\Facades\Log;

class ImcController extends Controller
{
    //home
    public function index()
    {
        return view("home");
    }

    //calcula o IMC
    public function imcCalc(ImcRequest $request)
    {

        try {
            $dados = $request->validated();

            $nome = $dados['name'];
            $peso = $dados['peso'];
            $altura = $dados['altura'];
            $descricao = "";

            $imc = $peso / pow($altura, 2);

            if($imc < 18.5) {
                $descricao = "Cuidado! Você está abaixo do peso.";
            } elseif ($imc >= 18.5 and $imc <= 25) {
                $descricao = "Você está no peso ideal.";
            } elseif ($imc > 25 and $imc <= 30) {
                $descricao = "Cuidado! Você está com sobrepeso.";
            } elseif ($imc > 30 and $imc <= 35) {
                $descricao = "Cuidado! Você está com obesidade moderada.";
            } elseif ($imc > 35 and $imc <= 40) {
                $descricao = "Cuidado! Você está com obesidade severa.";
            } else {
                $descricao = "Cuidado! Você está com obesidade mórbida.";
            }
            
            return back()->with([
                "success" => "O seu IMC foi calculado com sucesso",
                "imc" => $imc,
                "descricao" => $descricao,
                "nome" => $nome,
            ]);

        } catch (\Exception $e) {
           Log::error("Erro ao calcular IMC", [
                "url"      => $request->url(),
                "mensagem" => $e->getMessage(),
                "arquivo" => $e->getFile(),
                "linha" => $e->getLine(),
           ]);

            return back()->withInput()->with("error", "Ocorreu um erro ao calcular o seu IMC");
        }
        
    }
}
