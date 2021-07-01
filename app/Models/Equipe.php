<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nome', 'pais_id'];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function campeao(){
        return $this->hasMany(Campeao::class);
    }

    public function resultado(){
        return $this->hasMany(Resultado::class);
    }
}
