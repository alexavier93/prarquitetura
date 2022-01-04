<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabalheConoscoRequest extends FormRequest
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
            'nome'          => 'required',
            'email'         => 'required|email:rfc',
            'telefone'      => 'required',
            'cargo'         => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'  => 'Este campo é obrigatório',
            'email'     => 'Esse e-mail não é válido',
        ];
    }
}
