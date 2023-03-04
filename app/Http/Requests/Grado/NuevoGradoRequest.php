<?php

namespace App\Http\Requests\Grado;

use Illuminate\Foundation\Http\FormRequest;

class NuevoGradoRequest extends FormRequest
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
        return [
            'alumno_id'=>'required|exists:alumnos,id',
            'grado_id'=>'required|exists:grados,id',
            'seccion_id'=>'required|exists:seccions,id'
        ];
    }
}
