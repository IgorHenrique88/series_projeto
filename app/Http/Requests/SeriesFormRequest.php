<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome'=> 'required|min:2',
            'qtd_temporadas'=> 'required',
            'qtd_episodeos'=> 'required'

        ];
    }
    public function messages()
    {
        return [
            'required' => "O campo é obrigatório",
            'nome.min' => 'O campo nome deve ter mais de 2 caracteres'
        ];
    }

}
