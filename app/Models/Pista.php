<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nome', 'pais_id'];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function corrida(){
        return $this->hasMany(Corrida::class);
    }
}
