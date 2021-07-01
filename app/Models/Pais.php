<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    public $timestamps = false;
    protected $fillable = ['nome'];

    public function pistas(){
        return $this->hasMany(Pista::class);
    }

    public function piloto(){
        return $this->hasMany(Piloto::class);
    }

    public function equipe(){
        return $this->hasMany(Equipe::class);
    }
}
