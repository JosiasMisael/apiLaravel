<?php

namespace App\Http\Requests\Seccion;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class SeccionRequest extends FormRequest
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
                    'name'=>'required|unique:seccions,name',
              ];
            case 'put':
            case 'PUT':
                return [
                    'id'=>'required|exists:seccions,id',
                    'name'=>'required|unique:seccions,name,'.$this->seccion->id,
                 //   'name'=>['required',Rule::unique('seccions')->ignore($this->seccions->id,'id')],
                ];
            case 'delete':
            case 'DELETE':
                return [
                    'id'=>'required|integer|exists:seccions,id'
                ];
        }
    }

    public function attributes()
     {
        return [
            'id'=>'Identificador',
            'name'=>'Sección',
        ];
     }
}
