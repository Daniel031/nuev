<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteActividadRequest extends FormRequest
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
            'fecha' => 'required',
            'actividad' => 'required',
            'veces' => 'required',
            'tiempo' => '',
            'tiempoh' => '',
            'Radio' => 'required',
            'promedio' => 'required',
            'total' => 'required',
            'json' => '',
        ];
    }
    public function messages()
    {
        return [
            'fecha' => 'rellene el campo fecha',
            'veces' => 'rellene el campo veces',
        ];
    }
}
