<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SegundoGrauRequest;

class SegundoGrauController extends Controller
{
    //index
    public function index () {
        return view("home");
    }

    public function calculoSegundo (SegundoGrauRequest $request) {
        //Validando os valores enviados
        $dados = $request->validated();

        //Atribuindo os valores as variáveis
        $a = $dados["a"];
        $b = $dados["b"];
        $c = $dados["c"];
        $descricao = "";
        $resultado = "";

        //Calculando delta e raíz de delta
        $delta = pow($b, 2) - 4 * $a * $c;
        $raiz = sqrt($delta);
        if ($delta >= 0) {
            $raiz = sqrt($delta);
            $raizDelta = number_format($raiz,2);
        } else {
            $raiz = null;
            $raizDelta = "Sem raiz";
        }

        //As raízes da equação
        if ($delta > 0) {
            $x1 = (-$b + $raiz) / (2 * $a);
            $x2 = (-$b - $raiz) / (2 * $a);
            $descricao = "Se Delta (∆ > 0) for positivo, há duas raízes reais e distintas";
            $resultado = "X1 =" .number_format($x1, 0) . ", ". "X2 =". number_format($x2, 0);
        } elseif ($delta < 0) {
            $descricao = "Se Delta (∆ < 0) for negativo, não existem raízes reais";
        } elseif ($delta == 0) {
            $x1 = (-$b + $raiz) / (2 * $a);
            $x2 = (-$b - $raiz) / (2 * $a);
            $descricao = "Se Delta (∆ = 0) for igual a 0 há duas raízes reais e iguais";
            $resultado = "X1 =" .number_format($x1, 0) . ", ". "X2</sub> =". number_format($x2, 0);
        }

        return redirect()
        ->route("segundo.index")
        ->with([
            "success" => "Dados da equação recebidos",
            "a" => $a,
            "b" => $b,
            "c" => $c,
            "delta" => $delta,
            "raizDelta" => $raizDelta,
            "descricao" => $descricao,
            "resultado" => $resultado,
        ]);
    }
}
