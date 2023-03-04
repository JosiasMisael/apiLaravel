<?php

namespace App\Http\Requests\Grado;

use Illuminate\Foundation\Http\FormRequest;

class GradoRequest extends FormRequest
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
                    'name'=>'required|unique:grados,name',
              ];
            case 'put':
            case 'PUT':
                return [
                    'id'=>'required|exists:grados,id',
                    'name'=>'required|unique:grados,name,'.$this->seccion->id,
                 //   'name'=>['required',Rule::unique('grados')->ignore($this->grados->id,'id')],
                ];
            case 'delete':
            case 'DELETE':
                return [
                    'id'=>'required|integer|exists:grados,id'
                ];
        }
    }
     public function attributes()
     {
        return [
            'id'=>'Identificador',
            'name'=>'Grado',
        ];
     }

}
