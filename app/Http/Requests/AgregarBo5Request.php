<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgregarBo5Request extends FormRequest
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
            'idBo5' => 'required|unique:bo5s',
            'dia' => 'required',
            'nickIntegrante1' => 'required',
            'nickIntegrante2' => 'required',
        ];
    }

    public function messages() {

        return [
            'idBo5.required' => 'Por favor ingrese un id para el bo5.',
            'idBo5.unique' => 'Este id ya se encuentra en uso. Por favor ingrese otro id.',
            'nickIntegrante1.required' => 'Por favor seleccione un integrante.',
            'nickIntegrante2.required' => 'Por favor seleccione un integrante.'
        ];
    }
}
