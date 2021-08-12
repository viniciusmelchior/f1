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
        $temporadas = Temporada::all();
        $pilotos = Piloto::all();
        $equipes = Equipe::all();

        $campeao = Campeao::find($id);

        return view('admin.campeao.form-edit-campeao', ['temporadas' => $temporadas, 'pilotos' => $pilotos, 'equipes' => $equipes, 'campeao' => $campeao]);
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

        $campeao = Campeao::find($id);

        $temporada = $request->temporada_id;
        $pilotoCampeao = $request->piloto_id;
        $equipeCampea = $request->equipe_id;

        $campeao->update([
            'temporada_id' => $temporada,
            'piloto_id' => $pilotoCampeao,
            'equipe_id' => $equipeCampea
       ]);

        $pilotos = Piloto::all();
        $equipes = Equipe::all();
        $campeoes = Campeao::all();

        foreach($pilotos as $piloto){
            $titulosPilotoUpdate = Campeao::where('piloto_id', $piloto->id)->count();
            Piloto::where('id', $piloto->id)->update(['titulos' => $titulosPilotoUpdate]);   
        }

        //teste update
        foreach($campeoes as $campeao){

        }
        
        Piloto::where('id', $piloto->id)->update(['titulos' => $titulosPilotoUpdate]);

        foreach($equipes as $equipe){
            $titulosEquipeUpdate = Campeao::where('equipe_id', $equipe->id)->count();
            Equipe::where('id', $equipe->id)->update(['titulos' => $titulosEquipeUpdate]);   
        }

        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //selecionar o id e pegar os dados
        $campeao = Campeao::find($id);

         //deletar da tabela
        Campeao::find($id)->delete();

        //atualizar dados do piloto e da equipe

        $titulosPilotoUpdate = Campeao::where('piloto_id', $campeao->piloto_id)->count();
        Piloto::where('id', $campeao->piloto_id)->update(['titulos' => $titulosPilotoUpdate]);
        
        $titulosEquipeUpdate = Campeao::where('equipe_id', $campeao->equipe_id)->count();
        Equipe::where('id', $campeao->equipe_id)->update(['titulos' => $titulosEquipeUpdate]);

        return redirect()->back();
        
    }
}
