<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Juego extends Model {
    protected $fillable = [
    	'categoria_id', 'equipo_1', 'equipo_2', 'score_equipo_1', 'score_equipo_2', 'fecha_de_juego', 'estado'
    ];

    public function categorias(){
    	return $this->belongsTo('Categoria');
    }
}
