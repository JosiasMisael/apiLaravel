<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        $usuarios = User::all();
        return response()->json(['ok'=>$usuarios],200);
    }

    public function login(AuthRequest $request){

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)) {
            return response([
           'msg'=>'contraseña incorrecta'
            ],401);
        }
       $token= $user->createToken('login_token')->plainTextToken;
       return response()->json([
        'token'=>$token,
        'token_type'=>'Bearer'
    ]);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return [
          'msg'=>'yes'
        ];
    }

}
