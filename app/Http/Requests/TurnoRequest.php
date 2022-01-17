<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
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
            'nombre'=>'required',
            'cedula'=>'required',
            'edad'=>'required',
            'atencion'=>'required',
        ];

    }

    public function messages()
    {
        return[
            'nombre.required' => 'El nombre es requerido',
            'cedula.required' => 'La cedula es requerida',
            'edad.required' => 'la edad es requeridad',
            'atencion.required' => 'Escoge uno de los valores',
        ];
    }
}
