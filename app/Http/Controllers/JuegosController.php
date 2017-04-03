<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Juego;

class JuegosController extends Controller {
	public function show($id){
		try{
			$juegos = Categoria::findOrFail($id)->juegos;
		} catch (Exception $e){
    		$msg = 'Error.' . $e->getMessage();
			return response()->json(['error' => $msg], 500);
    	}

    	return response()->json($juegos, 200);
	}

	public function store(Request $req){
		try {
    		$juego = Juego::Create([
    			'categoria_id' => $req->categoria_id,
    			'equipo_1' => $req->equipo_1,
    			'equipo_2' => $req->equipo_2,
    			'score_equipo_1' => $req->score_equipo_1,
    			'score_equipo_2' => $req->score_equipo_2,
    			'fecha_de_juego' => $req->fecha_de_juego
			]);
    	} catch (Exception $e){
    		$msg = 'Error. ' . $e;
			return response()->json(['error' => $msg], 500);
    	}
    	return response()->json($juego, 200);
	}

	public function update(Request $request, $id){
        try {
            $juego = Juego::findOrFail($id);

            $juego->fill($request->all());
            $juego->save(); 
            
        } catch (Exception $ex) {
            $msg = 'Error. ' . $e;
			return response()->json(['error' => $msg], 500);
        }
        return response()->json($juego, 200);
    }

	public function destroy($id){
        try {
            $juego = Juego::findOrFail($id);
            $juego->delete();
        } catch (Exception $ex) {
           	$msg = 'Error. ' . $e;
			return response()->json(['error' => $msg], 500);
        }
        
         return response()->json($juego, 200);
    }
}
