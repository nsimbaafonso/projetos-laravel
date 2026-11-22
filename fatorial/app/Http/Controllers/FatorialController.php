<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FatorialRequest;

class FatorialController extends Controller
{
    //index
    public function index() 
    {
        return view("home");
    }

    //icalcular fatoria
    public function calcFatorial(FatorialRequest $request) 
    {
        $dados = $request->validated();

        $num = $dados["fatorial"];
        $fatorial = 1;
        $resultado = null;
        $sequencia = "";

        for ($i=$num; $i >= 1; $i--) { 
            $fatorial *= $i;

            $sequencia .= $i;

            if ($i > 1) {
                $sequencia .= " x ";
            }
        }

        $resultado = "$num! = $sequencia = $fatorial";

        return redirect()
        ->route("fatorial.index")
        ->with([
            "success" => "Fatorial calculado com sucesso",
            "resultado" => $resultado,
        ]);
    }
}
