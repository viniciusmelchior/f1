<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corrida extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['temporada_id', 'pista_id'];

    //hasOne Resultado
    public function resultado(){
        return $this->hasOne(Resultado::class);
    }

    public function temporada(){
        return $this->belongsTo(Temporada::class);
    }

    public function pista(){
        return $this->belongsTo(Pista::class);
    }
}
