<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EncriptadorRequest;

class EncriptadorController extends Controller
{
    //index
    public function index() 
    {
        return view("home");
    }

    //encriptar
    public function encriptar(EncriptadorRequest $request) 
    {
        $dados = $request->validated();

        $texto = $dados["texto"];
        $resultado = null;

        $encriptacao = md5($texto);

        $resultado = "O Hash gerado de $texto é: $encriptacao";


        return redirect()
        ->route("encriptador.index")
        ->with([
            "success" => "A encriptação foi feita com sucesso",
            "resultado" => $resultado,
        ]);
    }
}
