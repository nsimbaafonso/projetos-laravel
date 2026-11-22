<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeatherRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class WeatherController extends Controller
{
    //index
    public function index()
    {
        $cidades = [
            "Luanda",
            "Lisboa",
            "São Paulo"
        ];

        $localidades = [];

        foreach ($cidades as $cidade) {

            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                "q" => $cidade,
                "appid" => env("OPENWEATHER_API_KEY"),
                "units" => "metric",
                "lang" => "pt",
            ]);

            if ($response->successful()) {

                $clima = $response->json();

                $localidades[] = [
                    "cidade" => $clima["name"],
                    "pais" => $clima["sys"]["country"],
                    "temperatura" => $clima["main"]["temp"],
                    "condicao" => $clima["weather"][0]["description"],
                    "humidade" => $clima["main"]["humidity"],
                    "vento" => $clima["wind"]["speed"],
                ];
            }
        }

        return view("home", compact("localidades"));
    }

    //Buscar o tempo
    public function SearchWeather(WeatherRequest $request)
    {
        $dados = $request->validated();
        $localidade = $dados["localidade"];

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            "q" => $localidade,
            "appid" => env("OPENWEATHER_API_KEY"),
            "units" => "metric",
            "lang" => "pt",
        ]);

        //return dd($response->json());
        $clima = $response->json();

        $resultado = [
            "cidade" => $clima["name"],
            "pais" => $clima["sys"]["country"],
            "temperatura" => $clima["main"]["temp"],
            "condicao" => $clima["weather"][0]["description"],
            "sensacao" => $clima["main"]["feels_like"],
            "humidade" => $clima["main"]["humidity"],
            "vento" => $clima["wind"]["speed"],
        ];

        return redirect()
        ->route("weather.index")
        ->with("pesquisou", true)
        ->with("resultado", $resultado);
    }
}
