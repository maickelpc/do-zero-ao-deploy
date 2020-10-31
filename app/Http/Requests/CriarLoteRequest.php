<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CriarLoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->data_confirmacao != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'titulo' => 'required|max:100',
            'descricao' => 'required|max:10000',
            'lance_inicial' => 'required',
            'valor_incremento' => 'required',
            'tempo' => 'required',
            'tipo' => 'required',
            'localidade' => 'required|max:50',
            'nota_fiscal' => Rule::requiredIf($this->get('justificativa_nao_envio_nota_fiscal') == null),
            'justificativa_nao_envio_nota_fiscal' => Rule::requiredIf($this->get('nota_fiscal') == null),
        ];
    }
}
