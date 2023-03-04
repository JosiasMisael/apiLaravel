<?php

namespace App\Http\Controllers;

use App\Http\Requests\Alumno\AlumnoRequest;
use App\Http\Requests\Grado\NuevoGradoRequest;
use App\Http\Resources\AlumnoResource;
use App\Models\Alumno;
use App\Models\AlumnoGrado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{
    public function index(Request $request){

        if (isset($request->carnet)) {
           $alumnos = AlumnoResource::collection(Alumno::with(['grados','secciones'])->where('student_card','LIKE', '%'.$request->carnet.'%')->get());
        }
        elseif(isset($request->inicio) && isset($request->fin)){
            $alumnos = AlumnoResource::collection(Alumno::with(['grados','secciones'])->whereBetween('birthdate',[$request->inicio, $request->fin])->get());
         }
         else{
             $alumnos = AlumnoResource::collection(Alumno::with(['grados','secciones'])->paginate(20));
            }
            // $alumnos = Alumno::with(['grados','secciones'])->get();
            return response()->json(['ok'=>$alumnos],200);
      }

      public function store(AlumnoRequest $request){

        try {
            DB::beginTransaction();
            $alumno = Alumno::create([
                   'student_card'=>$request->student_card,
                   'name'=>$request->name,
                   'father_name'=>$request->father_name,
                   'mother_name'=>$request->mother_name,
                   'birthdate'=>$request->birthdate,
              ]);

              $asignacion = AlumnoGrado::create([
                  'alumno_id'=>$alumno->id,
                  'grado_id'=>$request->grado_id,
                  'seccion_id'=>$request->seccion_id,
                  'register_date' => Carbon::now()->toDateString()
              ]);
              // $alumno->asignaciones()->save($asignacion);
              DB::commit();
              return response()->json([
                'ok'=>$asignacion
            ],201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error'=>$th->getMessage()]);
        }
      }

      public function update(NuevoGradoRequest $request){

              $asignacion = AlumnoGrado::create([
                  'alumno_id'=>$request->alumno_id,
                  'grado_id'=>$request->grado_id,
                  'seccion_id'=>$request->seccion_id,
                  'register_date' => Carbon::now()->toDateString()
              ]);
              return response()->json([
                'dato'=>$asignacion
            ],201);

      }
}
