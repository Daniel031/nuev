<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlimentoRequest extends FormRequest
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
            'nombre'=>'required',
            'nombreComun'=>'required',
            'pesoUnico'=>'required',
            'tipoAlimento'=>'required',
            'energia'=>'required',
            'grasa'=>'required',
            'hCarbono'=>'required',
            'proteina'=>'required',
            'colesterol'=>'required',
            'fibraAlimentaria'=>'required',
            'sodio'=>'required',
            'agua'=>'required',
            'vitaminaA'=>'required',
            'vitaminaB6'=>'required',
            'vitaminaC'=>'required',
            'vitaminaD'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'Debe llenar el campo nombre ',
            'nombreComun.required'=>'Debe llenar el campo nombre Común ',
            'pesoUnico.required'=>'Debe llenar el campo peso único ',
            'tipoAlimento'=>'Debe seleccionar un tipo de Alimento',
            'energia.required'=>'Debe llenar el campo energia ',
            'grasa.required'=>'Debe llenar el campo grasa ',
            'hCarbono.required'=>'Debe llenar el campo H. Carbono ',
            'proteina.required'=>'Debe llenar el campo proteina ',
            'colesterol.required'=>'Debe llenar el campo colesterol ',
            'fibraAlimentaria.required'=>'Debe llenar el campo fibra Alimentaria ',
            'sodio.required'=>'Debe llenar el campo sodio ',
            'agua.required'=>'Debe llenar el campo agua ',
            'vitaminaA.required'=>'Debe llenar el campo vitamina A ',
            'vitaminaB6.required'=>'Debe llenar el campo vitamina B6 ',
            'vitaminaC.required'=>'Debe llenar el campo vitamina C ',
            'vitaminaD.required'=>'Debe llenar el campo vitamina D ',
        ];
    }
}
