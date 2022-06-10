<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|between:2,10',
            'historia' => 'required|string|between:10,100',
            'foto' => 'required|string'
        ];
    }
}
