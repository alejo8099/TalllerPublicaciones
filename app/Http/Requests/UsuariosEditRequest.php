<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosEditRequest extends FormRequest
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

            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios',
        ];
    }
    public function messages()
    {
        return [

            'nombre.required' => 'Debe escribir su nombre para el usuario',
            'email.required' => 'El campo del correo es obligatorio',
            'email.unique' => 'El correo ya esta registrado en otro usuario',

        ];
    }
}