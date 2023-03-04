<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seccion\SeccionRequest;
use App\Http\Resources\SeccionResource;
use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index(){
      $secciones = SeccionResource::collection(Seccion::all());
      return response()->json(['ok'=>$secciones],200);
    }

    public function store(SeccionRequest $request){
      $dato = Seccion::create([
            'name'=>$request->name
        ]);
        return response()->json(['ok'=>$dato],201);
    }
}
