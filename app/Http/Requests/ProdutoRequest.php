<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'categoria' => 'required|exists:categorias,id',
            'nome' => 'required|max:100',
            'preco' => 'required',
            'status' => 'required|boolean',
            'descricao' => 'required|min:5|max:500',
        ];
    }
}
