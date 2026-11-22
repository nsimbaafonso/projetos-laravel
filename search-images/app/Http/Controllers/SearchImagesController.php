<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchImagesRequest;
use Illuminate\Support\Facades\Http;

class SearchImagesController extends Controller
{
    //index
    public function index()
    {
        return view("home");
    }

    //search images
    public function SearchImages(SearchImagesRequest $request)
    {
        $dados = $request->validated();

        $pesquisa = $dados["pesquisa"];

        try {

            $response = Http::withHeaders([
                "Authorization" => env("PEXELS_API_KEY"),
            ])->get("https://api.pexels.com/v1/search", [
                "query" => $pesquisa,
                "per_page" => 12,
            ]);

            if (!$response->successful()) {
                return redirect()
                    ->route("images.index")
                    ->with("error", "Não foi possível obter as imagens.");
            }

            $fotos = $response->json("photos");

            $resultados = collect($fotos)->map(function ($foto) {
                return [
                    "url" => $foto["src"]["medium"],
                    "alt" => $foto["alt"],
                ];
            })->toArray();

            return redirect()
                ->route("images.index")
                ->with("pesquisou", true)
                ->with("pesquisa", $pesquisa)
                ->with("resultados", $resultados);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {

            return redirect()
                ->route("images.index")
                ->with("error", "Não foi possível conectar ao servidor. Verifique a sua conexão com a Internet.");
        }
    }
}
