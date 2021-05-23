<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
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
            'title'->'required|min:5|max:40',
            'message'->'required|min:5|max:500'
        ];
    }
    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório',
            'min'=>'O tamanho mínimo do :attribute é :min caracteres'
        ];
    }
}
