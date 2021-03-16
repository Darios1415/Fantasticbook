<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMunicipio extends FormRequest
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
            'municipio' =>'required|alpha|unique:municipios,municipio',
        ];
    }
    public function messages()
    {
        return[
        'municipio.required'=>'Municipio es requerido',
        'municipio.alpha'=>'solo puede contener letras',
        'municipio.unique'=>'Municipio ya existente',
        ];
    }
}
