<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PraticanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // setar para true se não for necessario a realização de login
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() 
    {
        //conjunto de regras para cadastro de praticantes
        return [
            'nomePraticante'=>'required', 
            'RespPelaColeta'=>'required',
            'id_profissional'=>'required',
            'id_responsavel'=>'required'        
        ];
    }
}
