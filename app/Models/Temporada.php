<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['ano'];

    public function resultado(){
        return $this->belongsTo(Resultado::class);
    }

    public function corrida(){
        return $this->HasMany(Corrida::class);
    }
}
