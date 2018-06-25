<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgregarEnfrentamientoRequest extends FormRequest
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

    public function rules()
    {
        return [
            'id' => 'required|unique:enfrentamientos,idEnfrentamiento',
            'equipo1' => 'required',
            'equipo2' => 'required',
            'editor' => 'required',
        ];
    }

    public function messages() {

        return [
            'id.required' => 'Por favor ingrese un id para el enfrentamiento.',
            'id.unique' => 'Este id ya se encuentra en uso. Por favor ingrese otro id.',
            'equipo1.required' => 'Por favor seleccione un equipo.',
            'equipo2.required' => 'Por favor seleccione un equipo.',
            'editor.required' => 'Por favor ingrese un editor.'
        ];
    }
}
