<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgregarInstanciaRequest extends FormRequest
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
            'idInstancia' => 'required|unique:instancias',
            'nombre' => 'required|unique:instancias',
            'fechaInicio' => 'required',
            'fechaFin' => 'required|after:fechaInicio',
            'enfrentamientosDisponibles' => 'required|array'
        ];
    }

    public function messages() {

        return [
            'idInstancia.required' => 'Por favor ingrese un id para la instancia.',
            'idInstancia.unique' => 'Este id ya se encuentra en uso. Por favor ingrese otro id.',
            'nombre.required' => 'Por favor ingrese un nombre.',
            'nombre.unique' => 'Este nombre ya se encuentra en uso. Por favor ingrese otro nombre.',
            'fechaInicio.required' => 'Por favor ingrese una fecha de inicio para la instancia.',
            'fechaFin.after' => 'La fecha de fin debe ser posterior a la fecha de inicio',
            'fechaFin.required' => 'Por favor ingrese una fecha de fin para la instancia.',
            'enfrentamientosDisponibles.required' => 'Por favor seleccione al menos un enfrentamiento para la instancia.',
            'enfrentamientosDisponibles.array' => 'El valor ingresado debe ser un arreglo.',
        ];
    }
}
