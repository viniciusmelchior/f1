<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use App\Models\Pais;
use Illuminate\Http\Request;

class PistaController extends Controller
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
        $paises = Pais::all();
        return view('admin.pista.pistas', ['paises' => $paises]);
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
        //dd($request->all());
        $nomePista = $request->nome;
        $pais_id = $request->pais_id;

        Pista::create([
            'nome' => $nomePista,
            'pais_id' => $pais_id,
        ]);

        return redirect('form-adiciona-pista');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function show(Pista $pista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function edit(Pista $pista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pista $pista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pista  $pista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pista $pista)
    {
        //
    }
}
