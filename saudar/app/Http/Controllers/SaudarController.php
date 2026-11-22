<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SaudarController extends Controller
{
    //home
    public function index ()
    {
        //Pegando a hora
        $hora = Carbon::now()->hour;

         if ($hora < 12) {
            $cor = "#b6b616";
            $imagem = "img/fotomanha.png";
            $mensagem = "Bom dia";
        } elseif ($hora < 18) {
            $cor = "#bb7c06";
            $imagem = "img/fototarde.png";
            $mensagem = "Boa tarde";
        } else {
            $cor = "#1f1d1d";
            $imagem = "img/fotonoite.png";
            $mensagem = "Boa noite";
        }

        return view("home", compact("hora", "cor", "imagem", "mensagem"));
    }
}
