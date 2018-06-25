<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgregarIntegranteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return AUTH::check();
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
            'apellido' => 'required',  
            'nickname' => 'required|min:5|unique:integrantes',
            'DNI' => 'required|unique:integrantes',
            'edad' => 'integer|nullable',     
        ];
    }

    public function messages() {

        return [
            'nombre.required' => 'Por favor ingrese su nombre.',
            'apellido.required' => 'Por favor ingrese su apellido.',
            'nickname.required' => 'Por favor ingrese su nickname.',
            'nickname.min' => 'Por favor ingrese un nick con más de 5 caracteres.',
            'nickname.unique' => 'Este nickname ya se encuentra en uso. Por favor ingrese otro nickname.',
            'DNI.required' => 'Por favor ingrese su DNI.',
            'DNI.unique' => 'Este DNI ya tiene asociado un jugador.',
            'edad.integer' => 'La edad debe ser un número entero.'
        ];
    }
}
