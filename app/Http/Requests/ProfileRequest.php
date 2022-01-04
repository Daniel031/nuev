<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'ci'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'fechaNacimiento'=>'required',
            'sexo'=>'required',
            'celular'=>'required',
            'nutricionista_id'=>'required',
            'image'=>'required|image|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'ci.required'=>'Debe rellenar el campo CI',
            'nombres.required'=>'Debe rellenar el campo Nombre',
            'apellidos.required'=>'Debe rellenar el campo Apellido',
            'fechaNacimiento.required'=>'Debe rellenar el campo Fecha de Nacimiento',
            'sexo.required'=>'Debe rellenar el campo Sexo',
            'celular.required'=>'Debe rellenar el campo Celular',
            'image.required'=>'Debe rellenar el campo Imagen',
        ];
    }
}
