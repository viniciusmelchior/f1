<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'corrida_id',
        'pole_piloto',
        'pole_equipe',
        'primeiro_piloto',
        'primeiro_equipe',
        'segundo_piloto',
        'segundo_equipe',
        'terceiro_piloto',
        'terceiro_equipe',
        'eu_largada',
        'eu_chegada'
    ];

    //belongsTo Corrida
    public function corrida(){
        return $this->belongsTo(Corrida::class);
    }

    public function temporada(){
        return $this->hasOne(Temporada::class);
    }

    public function polePiloto(){
        return $this->belongsTo(Piloto::class,'pole_piloto','id');
    }

    public function poleEquipe(){
        return $this->belongsTo(Equipe::class,'pole_equipe','id');
    }

    public function primeiroPiloto(){
        return $this->belongsTo(Piloto::class,'primeiro_piloto','id');
    }

    public function primeiroEquipe(){
        return $this->belongsTo(Equipe::class,'primeiro_equipe','id');
    }

    public function segundoPiloto(){
        return $this->belongsTo(Piloto::class,'segundo_piloto','id');
    }

    public function segundoEquipe(){
        return $this->belongsTo(Equipe::class,'segundo_equipe','id');
    }

    public function terceiroPiloto(){
        return $this->belongsTo(Piloto::class,'terceiro_piloto','id');
    }

    public function terceiroEquipe(){
        return $this->belongsTo(Equipe::class,'terceiro_equipe','id');
    }
}
