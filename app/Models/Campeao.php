<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeao extends Model
{
    use HasFactory;

    protected $table = 'campeoes';

    public $timestamps = false;
    protected $fillable = ['piloto_id','equipe_id', 'temporada_id'];

    public function piloto(){
        return $this->belongsTo(Piloto::class);
    }

    public function equipe(){
        return $this->belongsTo(Equipe::class);
    }

    public function temporada(){
        return $this->belongsTo(Temporada::class);
    }
}
