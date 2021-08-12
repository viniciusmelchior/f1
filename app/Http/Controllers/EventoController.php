<?php

namespace App\Http\Controllers;
use App\Models\Equipe;
use App\Models\Piloto;
use App\Models\Pista;
use App\Models\Temporada;
use App\Models\Corrida;
use App\Models\Resultado;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;

class EventoController extends Controller
{   
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        //enviar equipes, pilotos, temporada,pistas
        $temporadas = Temporada::all();
        $equipes = Equipe::all();
        $pilotos = Piloto::all();
        $pistas = Pista::all();

        return view('admin.evento.eventos', [
            'temporadas' => $temporadas,
            'equipes' => $equipes,
            'pilotos' => $pilotos,
            'pistas' => $pistas
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
      
        //capturando dados do formulario
        $temporada_id = $request->temporada_id;
        $pista_id = $request->pista_id;

        //verificar se o evento/corrida já existe
        $corrida = new Corrida();
        $existe = $corrida->where('temporada_id', $temporada_id)->where('pista_id', $pista_id)->get()->first();

        if(isset($existe->temporada_id) && isset($existe->pista_id)){
            return back()->withErrors(['errors' => 'Evento ja cadastrado anteriormente']);
        } 

        //inserir validações

        //criar corrida
        $corrida = Corrida::create([
            'temporada_id' => $temporada_id,
            'pista_id' => $pista_id
        ]);
        
        //pegar a corrida criada e já recuperar o id dela
        $ultimoId = $corrida->id;
        //criar resultado
        $corrida_id = $ultimoId;
        $pole_piloto = $request->pole_piloto; 
        $pole_equipe = $request->pole_equipe;
        $primeiro_piloto = $request->primeiro_piloto;
        $primeiro_equipe = $request->primeiro_equipe;
        $segundo_piloto = $request->segundo_piloto;
        $segundo_equipe = $request->primeiro_equipe;
        $terceiro_piloto = $request->terceiro_piloto;
        $terceiro_equipe = $request->terceiro_equipe;
        $eu_largada = $request->eu_largada;
        $eu_chegada = $request->eu_chegada;
        
        //refatorando atualizações no banco
        
        //salvar o evento no banco 
        Resultado::create([
            'corrida_id' => $corrida_id,
            'pole_piloto' => $pole_piloto,
            'pole_equipe' => $pole_equipe,
            'primeiro_piloto' => $primeiro_piloto,
            'primeiro_equipe' => $primeiro_equipe,
            'segundo_piloto' => $segundo_piloto,
            'segundo_equipe' => $segundo_equipe,
            'terceiro_piloto' => $terceiro_piloto,
            'terceiro_equipe' => $terceiro_equipe,
            'eu_largada' => $eu_largada,
            'eu_chegada' => $eu_chegada
        ]);

         $pilotos = Piloto::all();
         $equipes = Equipe::all();

        //atualizando automaticamente pro novo formato de atualização

        //atualizando vitorias
        foreach($pilotos as $piloto){
            $vitoriasPilotoUpdate = Resultado::where('primeiro_piloto', $piloto->id)->count();
            Piloto::where('id', $piloto->id)->update(['vitorias' => $vitoriasPilotoUpdate]);   
        }

         foreach($equipes as $equipe){
            $vitoriasEquipeUpdate = Resultado::where('primeiro_equipe', $equipe->id)->count();
            Equipe::where('id', $equipe->id)->update(['vitorias' => $vitoriasEquipeUpdate]);   
        }

        //atualizando poles

       foreach($pilotos as $piloto){
             $polesPilotoUpdate = Resultado::where('pole_piloto', $piloto->id)->count();
             Piloto::where('id', $piloto->id)->update(['poles' => $polesPilotoUpdate]);   
        }

         foreach($equipes as $equipe){
            $polesEquipeUpdate = Resultado::where('pole_equipe', $equipe->id)->count();
            Equipe::where('id', $equipe->id)->update(['poles' => $polesEquipeUpdate]);   
        }

        return redirect('form-adiciona-evento');
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
        $resultado = Resultado::find($id);
        $temporadas = Temporada::all();
        $equipes = Equipe::all();
        $pilotos = Piloto::all();
        $pistas = Pista::all();

        return view('admin.evento.edit-evento', [
            'resultado' => $resultado,
            'temporadas' => $temporadas,
            'equipes' => $equipes,
            'pilotos' => $pilotos,
            'pistas' => $pistas
            ]);
    
       
        //dd($resultado->polePiloto->nome);
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
        $resultado = Resultado::find($id);
        $corrida = Corrida::where('id', $resultado->id);

        //capturando dados do formulario
        $temporada_id = $request->temporada_id;
        $pista_id = $request->pista_id;

        //editar corrida
        $corrida->update([
            'temporada_id' => $temporada_id,
            'pista_id' => $pista_id
        ]);
        
        $pole_piloto = $request->pole_piloto; 
        $pole_equipe = $request->pole_equipe;
        $primeiro_piloto = $request->primeiro_piloto;
        $primeiro_equipe = $request->primeiro_equipe;
        $segundo_piloto = $request->segundo_piloto;
        $segundo_equipe = $request->primeiro_equipe;
        $terceiro_piloto = $request->terceiro_piloto;
        $terceiro_equipe = $request->terceiro_equipe;
        $eu_largada = $request->eu_largada;
        $eu_chegada = $request->eu_chegada;
        
        //salvar o evento no banco 
        $resultado->update([
            //'corrida_id' => $corrida_id,
            'pole_piloto' => $pole_piloto,
            'pole_equipe' => $pole_equipe,
            'primeiro_piloto' => $primeiro_piloto,
            'primeiro_equipe' => $primeiro_equipe,
            'segundo_piloto' => $segundo_piloto,
            'segundo_equipe' => $segundo_equipe,
            'terceiro_piloto' => $terceiro_piloto,
            'terceiro_equipe' => $terceiro_equipe,
            'eu_largada' => $eu_largada,
            'eu_chegada' => $eu_chegada
        ]);

         $pilotos = Piloto::all();
         $equipes = Equipe::all();

        //atualizando automaticamente pro novo formato de atualização

        //atualizando vitorias
        foreach($pilotos as $piloto){
            $vitoriasPilotoUpdate = Resultado::where('primeiro_piloto', $piloto->id)->count();
            Piloto::where('id', $piloto->id)->update(['vitorias' => $vitoriasPilotoUpdate]);   
        }

         foreach($equipes as $equipe){
            $vitoriasEquipeUpdate = Resultado::where('primeiro_equipe', $equipe->id)->count();
            Equipe::where('id', $equipe->id)->update(['vitorias' => $vitoriasEquipeUpdate]);   
        }

        //atualizando poles

       foreach($pilotos as $piloto){
             $polesPilotoUpdate = Resultado::where('pole_piloto', $piloto->id)->count();
             Piloto::where('id', $piloto->id)->update(['poles' => $polesPilotoUpdate]);   
        }

         foreach($equipes as $equipe){
            $polesEquipeUpdate = Resultado::where('pole_equipe', $equipe->id)->count();
            Equipe::where('id', $equipe->id)->update(['poles' => $polesEquipeUpdate]);   
        }

        return redirect()->route('home');
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
        $resultado = Resultado::find($id);
        Resultado::find($id)->delete();

        $CorridaApagar = Corrida::where('id', $resultado->corrida_id);
        $CorridaApagar->delete();

       
    
        $vitoriasPilotoUpdate = Resultado::where('primeiro_piloto', $resultado->primeiro_piloto)->count();
        Piloto::where('id', $resultado->primeiro_piloto)->update(['vitorias' => $vitoriasPilotoUpdate]);   
        
        $vitoriasEquipeUpdate = Resultado::where('primeiro_equipe', $resultado->primeiro_equipe)->count();
        Equipe::where('id', $resultado->primeiro_equipe)->update(['vitorias' => $vitoriasEquipeUpdate]);  
        
        $polesPilotoUpdate = Resultado::where('pole_piloto',$resultado->pole_piloto)->count();
        Piloto::where('id', $resultado->pole_piloto)->update(['poles' => $polesPilotoUpdate]);
        
        $polesEquipeUpdate = Resultado::where('pole_equipe', $resultado->pole_equipe)->count();
        Equipe::where('id', $resultado->pole_equipe)->update(['poles' => $polesEquipeUpdate]); 

        //atualizar os dados e devolver
        return redirect()->back();

    }
}
