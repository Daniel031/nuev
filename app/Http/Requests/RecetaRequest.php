<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetaRequest extends FormRequest
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
            'vector'=>'required',
            'nombre'=>'required',
            'preparacion'=>'required',
            'peso'=>'required',
            'porcion'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Debe llenar el campo nombre ',
            'preparacion.required'=>'Debe llenar el campo preparación',
            'peso.required'=>'Debe llenar el campo peso',
            'porcion.required'=>'Debe llenar el campo porcion',
        ];
    }
}
