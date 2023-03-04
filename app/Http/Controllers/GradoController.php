<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grado\GradoRequest;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Http\Resources\Grado as GradoResource;
class GradoController extends Controller
{

    public function index(){

        $grados =GradoResource::collection(Grado::all());
        return response()->json(['ok'=>$grados],200);
      }

      public function store(GradoRequest $request){
        $dato = Grado::create([
              'name'=>$request->name
          ]);
          return response()->json(['dato'=>$dato],201);
      }
}
