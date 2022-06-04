<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // TODO: better authorizaztion
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'nullable|string|min:1|max:30',
            'cognome' => 'nullable|string|min:1|max:30',
            'username' => 'nullable|string|min:5|max:30|unique:users',
            'password' => 'nullable|min:8|max:128|confirmed',
            'data_nascita' => 'nullable|date',
            'genere' => 'string|min:1|max:10',
        ];
    }
}
