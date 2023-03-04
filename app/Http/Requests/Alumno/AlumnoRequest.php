<?php

namespace App\Http\Requests\Alumno;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      switch ($this->method()) {
        case 'post':
        case 'POST':
            return [
            'student_card'=>'required|unique:alumnos,student_card',
            'name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'birthdate'=>'required|date',
            'grado_id'=>'required|integer|exists:grados,id',
            'seccion_id'=>'required|exists:seccions,id',
            ];
        case 'put':
        case 'PUT':
            return[
                'id'=>'required|integer|exists:alumnos,id',
                'student_card'=>'required|unique:alumnos,studen_card',
                'name'=>'required',
                'father_name'=>'required',
                'mother_name'=>'required',
                'birthdate'=>'required|date',
                'grado_id'=>'required|integer|exists:grados,id',
                'seccion_id'=>'required|exists:seccions,id',
            ];
        case 'delete':
        case 'DELETE':
            return [
                'id'=>'required|integer|exists:alumnos,id',
            ];
        default:
            return [

            ];
      }

        return [
            'student_card'=>'required|unique:alumnos,studen_card',
            'name'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'birthdate'=>'required|date',
            'grado_id'=>'required|numeric',
            'seccion_id'=>'required|numeric',
        ];
    }

    public function attributes()
     {
        return [
            'student_card'=>'Carnet',
            'name'=>'Nombre',
            'father_name'=>'Nombre del Padre',
            'mother_name'=>'Nombre de la Madre',
            'birthdate'=>'Fecha de Nacimiento',
            'grado_id'=>'Grado',
            'seccion_id'=>'Sección',
        ];
     }
}
