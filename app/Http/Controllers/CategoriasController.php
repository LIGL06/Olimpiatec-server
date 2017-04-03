<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Juego;

class CategoriasController extends Controller {
	
	public function index(){
    	$categoriasConjunto = Categoria::where('tipo', 0)->orderBy('name', 'desc')->get();
    	$categoriasIndividuales = Categoria::where('tipo', 1)->orderBy('name', 'desc')->get();

    	return response()->json(['conjunto' => $categoriasConjunto, 'individuales' => $categoriasIndividuales], 200);
	}

	public function show($id){
		try{
			$cateogria = Categoria::findOrFail($id);
			if(!$categoria){
				$msg = 'Categoria not found.';
	    		return response()->json(['error' => $msg], 404);
			} else {
				$juegos = $categoria->juegos;
				return response()->json(['categoria' => $categoria, 'juegos' => $juegos], 200);
			}
		} catch (Exception $e){
    		$msg = 'Error.' . $e->getMessage();
			return response()->json(['error' => $msg], 500);
    	}

    	return response()->json($post, 200);
	}

	public function store(Request $req){
		try {
    		$this->validate($req, [
				'tipo' => 'required | integer',
    			'name' => 'required | max: 250'
			]);
    		$categoria = Categoria::Create([
    			'tipo' => $req->tipo,
    			'name' => $req->name
			]);
    	} catch (Exception $e){
    		$msg = 'Error. ' . $e;
			return response()->json(['error' => $msg], 500);
    	}
    	return response()->json($categoria, 200);
	}

	public function update(Request $request, $id){
        try {
            $this->validate($request, 
                [
                    'name' => 'required | max:255',
                    'tipo'=> 'required|integer'
                ]
            );
            
            $categoria = Categoria::findOrFail($id);

            $categoria->fill($request->all());
            $categoria->save(); 
            
        } catch (Exception $ex) {
            $msg = 'Error. ' . $e;
			return response()->json(['error' => $msg], 500);
        }
        return response()->json($categoria, 200);
    }

    public function destroy($id){
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
        } catch (Exception $ex) {
           	$msg = 'Error. ' . $e;
			return response()->json(['error' => $msg], 500);
        }
        
         return response()->json($categoria, 200);
    }

}
