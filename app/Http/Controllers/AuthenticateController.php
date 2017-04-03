<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

class AuthenticateController extends Controller{
    
    public function index(){

    }

    public function authenticate(Request $request){
    	$credentials = $request->only('email', 'password');

    	try{
			if(!$token = JWTAuth::attempt($credentials)){
				$msg = 'Invalid email or password.';
				return response()->json(['error' => $msg], 401);
			}
    	} catch (JWTException $e) {
    		$msg = 'Could not create token.' . $e->getMessage();
			return response()->json(['error' => $msg], 500);
    	}

    	return response()->json(compact('token'));
    }
}
