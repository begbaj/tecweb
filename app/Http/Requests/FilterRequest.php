<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'luogo' => "nullable|string|max:150",
            'tipo' => 'nullable',
            'prezzo' => 'nullable|numeric|min:0',
            'dimensione' => 'nullable|numeric|min:0',
            'data_min' => 'nullable|date_format:d/m/Y',
            'data_max' => 'nullable|date_format:d/m/Y|after:start-date',
            'posti_letto' => 'nullable|numeric|min:1',
            'camere' => 'nullable|numeric|min:1'

        ];
    }
}
