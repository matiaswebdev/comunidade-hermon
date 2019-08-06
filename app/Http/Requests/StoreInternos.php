<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInternos extends FormRequest
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
            'nome' => 'required|unique:internos|max:256',
            'data_entrada' => 'required',
            'procedencia' => 'required|max:256',
            'nascimento' => 'max:10',
            'naturalidade' => 'required|max:256',
            'nome_pai' => 'required|max:256',
            'nome_mae' => 'required|max:256',
            'atendente' => 'required|max:256'
        ];
    }
}
