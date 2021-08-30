<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $temporadas = Temporada::all();
        return view('admin.temporada.temporada-index', ['temporadas' => $temporadas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.temporada.temporadas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar se o ano ja nao está cadastrado
        $ano = $request->ano;
        $temporada = new Temporada();
        $existe = $temporada->where('ano', $ano)->get()->first();
        if(isset($existe->ano)){
            return back()->withErrors(['errors' => 'temporada '.$ano." já está cadastrada"]);
        }
       
        Temporada::create([
            'ano' => $ano
        ]);

        return redirect()->route('temporadas');
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
        //dd('chegamos no edit');
        $temporada = Temporada::find($id);
        //dd($temporada->ano);
        return view('admin.temporada.temporada-edit-form', [
            'temporada' => $temporada
        ]);
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
        $temporadaEditar = Temporada::find($id);

        //validar se o ano ja nao está cadastrado
        $ano = $request->ano;
        $temporada = new Temporada();
        $existe = $temporada->where('ano', $ano)->get()->first();
        if(isset($existe->ano)){
            return back()->withErrors(['errors' => 'temporada '.$ano." já está cadastrada"]);
        }

        $temporadaEditar->update([
            'ano' => $ano
        ]);

        return redirect()->route('temporadas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temporada = Temporada::find($id)->delete();
        return redirect()->back();
    }
}
