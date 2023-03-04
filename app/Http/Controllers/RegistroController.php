<?php

namespace App\Http\Controllers;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
class RegistroController extends Controller
{
    public function store(UserRequest $request){
      $usuario = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password
      ]);
      return response()->json($usuario, 201);
    }
}
