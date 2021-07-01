<?php

namespace App\Http\Controllers;

use App\Models\Campeao;
use App\Models\Equipe;
use App\Models\Piloto;
use App\Models\Temporada;
use Illuminate\Http\Request;

class CampeaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "chegamos até aqui";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $temporadas = Temporada::all();
        $pilotos = Piloto::all();
        $equipes = Equipe::all();
        return view('admin.campeao.campeoes', [
            'temporadas' => $temporadas,
            'pilotos' => $pilotos,
            'equipes' => $equipes
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $temporada = $request->temporada_id;
        $pilotoCampeao = $request->piloto_id;
        $equipeCampea = $request->equipe_id;
        Campeao::create([
            'temporada_id' => $temporada,
            'piloto_id' => $pilotoCampeao,
            'equipe_id' => $equipeCampea
       ]);
        
         //############## TITULO DO PILOTO ############################################

       //busca quantos titulos o piloto campeao tem até o momento
        //$titulosPilotoAteOMomento = Piloto::where('id', $pilotoCampeao)->select('titulos')->first()->titulos;
        //calculo de atualização
        //$tituloPilotoUpdate = $titulosPilotoAteOMomento+1;
        //update do campo titulo do respectivo piloto
        //Piloto::where('id', $pilotoCampeao)->update(['titulos' => $tituloPilotoUpdate]);

        //############## TITULO DA EQUIPE ############################################

        //$titulosEquipeAteOMomento = Equipe::where('id', $equipeCampea)->select('titulos')->first()->titulos;
        //$tituloEquipeUpdate = $titulosEquipeAteOMomento+1;
        //Equipe::where('id', $equipeCampea)->update(['titulos' => $tituloEquipeUpdate]);

        //refatorando TITULOS de PILOTO

        $pilotos = Piloto::all();
        $equipes = Equipe::all();

        foreach($pilotos as $piloto){
            $titulosPilotoUpdate = Campeao::where('piloto_id', $piloto->id)->count();
            Piloto::where('id', $piloto->id)->update(['titulos' => $titulosPilotoUpdate]);   
        }

        foreach($equipes as $equipe){
            $titulosEquipeUpdate = Campeao::where('equipe_id', $equipe->id)->count();
            Equipe::where('id', $equipe->id)->update(['titulos' => $titulosEquipeUpdate]);   
        }

        
       
       return redirect('form-adiciona-campeao');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
