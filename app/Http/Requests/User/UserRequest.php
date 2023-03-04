<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:4'
                ];
            case 'put':
            case 'PUT':
                return [
                    'name'=>'required',
                    'email'=>'required|email|unique:users,email,'.$this->user->id,
                    'password'=>'required|min:4'
                    ];


        }
    }
}
