<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdoptionPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules($request)
    {

        return [
            'email' => 'required|email',
            'valor' => 'required|numeric|between:10,100',
            'pet_id' => 'required|int|exists:pets,id'
        ];
    }
}
