<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Juego;
class Categoria extends Model {
	protected $fillable = [
    	'tipo', 'name'
    ];

    public function juegos(){
    	return $this->hasMany('App\Juego');
    }
}
