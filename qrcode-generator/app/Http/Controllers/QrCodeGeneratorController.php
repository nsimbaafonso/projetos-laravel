<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QrCodeGeneratorRequest;
use F9WebLtd\QrCode\Facades\QrCode;

class QrCodeGeneratorController extends Controller
{
    //index
    public function index ()
    {
        return view("home");
    }

    //qrcode generator
    public function qrCodeGenerator (QrCodeGeneratorRequest $request)
    {
        $dados = $request->validated();
        $texto = $dados["texto"];
        $tamanho = $dados["tamanho"];
        $cor = $dados["cor"];

        $corRgb = sscanf($cor, "#%02x%02x%02x");

        $resultado = QrCode::size($tamanho)->color($corRgb[0], $corRgb[1], $corRgb[2])->generate($texto);
        //dd($resultado);

        session([
            "texto" => $texto,
            "tamanho" => $tamanho,
            "cor" => $cor,
        ]);

        return redirect()
            ->route("qrcode.index")
            ->with("success", "QRCode gerado com sucesso")
            ->with("resultado", $resultado->toHtml());
    }

    //download qrcode
    public function downloadQrCode()
    {
        $texto = session("texto");
        $tamanho = session("tamanho");
        $cor = session("cor");

        $corRgb = sscanf($cor, "#%02x%02x%02x");

        $resultado = QrCode::size($tamanho)
            ->color($corRgb[0], $corRgb[1], $corRgb[2])
            ->generate($texto);

        $svg = $resultado->toHtml();

        return response($svg)
            ->header("Content-Type", "image/svg+xml")
            ->header(
                "Content-Disposition",
                'attachment; filename="qrcode.svg"'
            );
    }
}
