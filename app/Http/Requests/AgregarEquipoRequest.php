<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgregarEquipoRequest extends FormRequest
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
            'nombre' => 'required|unique:equipos',
            'institucion' => 'required',
            'integrantesDisponibles' => 'required|array|size:3'    
        ];
    }

    public function messages() {

        return [
            'nombre.required' => 'Por favor ingrese su nombre.',
            'nombre.unique' => 'Este nombre ya se encuentra en uso. Por favor ingrese otro nombre.',
            'institucion.required' => 'Por favor ingrese su institucion.',
            'integrantesDisponibles.required' => 'Debe seleccionar exactamente 3 jugadores.',
            'integrantesDisponibles.size' => 'Debe seleccionar exactamente 3 jugadores.',
            'integrantesDisponibles.array' => 'El campo debe ser del tipo Array.'
        ];
    }
}
