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
            'cantidadSemanal' => 'required',
            'tiempoDiario' => 'required',
            'promedioDiario' => '',
            'gastoActividad' => '',
            'fechaHora_establecida' => 'required',
            'fechaHora_cumplida' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'cantidadSemanal' => 'El campo cantidad semanal es requerido',
            'tiempoDiario' => 'El campo tiempo Diario es requerido',
            'fechaHora_establecida' => 'required',
            'fechaHora_cumplida' => 'required',
        ];
    }
}
