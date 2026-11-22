<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColorGeneratorRequest;

class ColorGeneratorController extends Controller
{
    //index
    public function index () {
        return view("home");
    }

    //index
    public function generateColor (ColorGeneratorRequest $request) {
        //validando os dados
        $dados = $request->validated();

        $r = $dados["r"];
        $g = $dados["g"];
        $b = $dados["b"];
        $cor = null;

        //A cor
        $cor = "rgb($r, $g, $b)";

        return redirect()
        ->route("generator.index")
        ->with([
            "success" => "Cor gerada com sucesso",
            "cor" => $cor,
        ]);
    }
}
