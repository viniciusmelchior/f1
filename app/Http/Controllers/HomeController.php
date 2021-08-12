<?php

namespace App\Http\Controllers;

use App\Models\Campeao;
use App\Models\Equipe;
use App\Models\Pais;
use App\Models\Piloto;
use App\Models\Pista;
use App\Models\Resultado;
use App\Models\Temporada;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

        //pegar todas as pistas
        $pistas = Pista::all();

        //pegar todos os países
        $paises = Pais::all();

        //recuperar dados dos pilotos
        $pilotos = Piloto::all();
        $pilotosVitorias = Piloto::orderBy('vitorias', 'DESC')->limit(10)->get();
        $pilotosPoles = Piloto::orderBy('poles', 'DESC')->limit(10)->get();
        $pilotosTitulos = Piloto::orderBy('titulos', 'DESC')->limit(10)->get();

        //recuperar dados das equipes
        $equipes = Equipe::all();
        $equipesVitorias = Equipe::orderBy('vitorias', 'DESC')->limit(10)->get();
        $equipesPoles = Equipe::orderBy('poles', 'DESC')->limit(10)->get();
        $equipesTitulos = Equipe::orderBy('titulos', 'DESC')->limit(10)->get();

        //recuperar dados da temporada
        $temporadas = Temporada::all();

        //recuperar campeoes
        $campeoes = Campeao::orderBy('temporada_id')->get();

        //recuperar eventos
        $resultados = Resultado::all();

        $totCampeao = Campeao::count();
        $totEventos = Resultado::count();

        //enviar dados para view
        return view('home.home',[
            'paises' => $paises,
            'pistas' => $pistas,
            'pilotos' => $pilotos,
            'pilotosVitorias' => $pilotosVitorias,
            'pilotosPoles' => $pilotosPoles,
            'pilotosTitulos' => $pilotosTitulos,
            'equipesVitorias' => $equipesVitorias,
            'equipesPoles' => $equipesPoles,
            'equipesTitulos' => $equipesTitulos,
            'equipes' => $equipes,
            'temporadas' => $temporadas,
            'campeoes' => $campeoes,
            'resultados' => $resultados,
            'totEventos' => $totEventos,
            'totCampeao' => $totCampeao
        ]);

    }
}
