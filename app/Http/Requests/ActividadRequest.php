<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
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
            'MET' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el NOMBRE de la Actividad',
            'MET.required' => 'Debe ingresar el MEC de la Actividad',

            // 'estado.boolean'=> 'debe seleccionar el estado del trabajador'
        ];
    }
}
