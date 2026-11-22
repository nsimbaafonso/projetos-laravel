<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "url" => ["required", "url"],
            ],
            [
                "url.required" => "Por favor, informe uma URL.",
                "url.url" => "Informe uma URL válida. Exemplo: https://www.google.com",
            ],
            [
                "url" => "URL",
            ]
        );

        try {

            // Gera um código aleatório para a URL
            $shortCode = Str::random(6);

            // Guarda a URL no banco de dados
            $short = ShortUrl::create([
                "original_url" => $request->url,
                "short_code"   => $shortCode,
            ]);

            // Retorna para a página com mensagem de sucesso
            return back()
                ->with("success", "URL encurtada com sucesso!")
                ->with("short_url", url("/") . "/". $short->short_code);

        } catch (\Exception $e) {

            // Registra o erro no arquivo laravel.log
            Log::error('Erro ao criar URL encurtada.', [
                "url"       => $request->url,
                "mensagem"  => $e->getMessage(),
                "arquivo "  => $e->getFile(),
                "linha"     => $e->getLine(),
            ]);

            // Retorna uma mensagem amigável para o utilizador
            return back()->withInput()->with(
                "error",
                "Ocorreu um erro ao encurtar a URL. Tente novamente."
            );
        }

    }

    public function redirect($code)
    {
        try {

            // Procura o código no banco
            $url = ShortUrl::where("short_code", $code)->first();

            // Caso não exista, retorna para a página inicial
            if (!$url) {
                return redirect("/")
                    ->with("error", "A URL informada não existe.");
            }

            // Incrementa o número de acessos
            $url->increment("clicks");

            // Redireciona para a URL original
            return redirect()->away($url->original_url);

        } catch (\Exception $e) {

            // Registra o erro no log
            Log::error('Erro ao redirecionar URL.', [
                "codigo "   => $code,
                "mensagem"  => $e->getMessage(),
                "arquivo "  => $e->getFile(),
                "linha"     => $e->getLine(),
            ]);

            // Retorna mensagem amigável
            return redirect("/")
                ->with("error", "Não foi possível acessar esta URL.");
        }
    }
}
