<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAccomodationRequest extends FormRequest
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
            'titolo' => 'required|string|min:4|max:100',
            'descrizione' => 'required|string|min:20|max:5000',
            'tipo' => 'required',
            'eta_min' => 'sometimes|numeric|nullable|min:18|max:100',
            'eta_max' => 'required_with:eta_min|numeric|min:18|max:100|greater_than_field:eta_min',
            'sesso' => 'sometimes|nullable|string',
            'prezzo' => 'required|numeric|min:0',
            'superficie' => 'required|numeric|min:0',
            'data_min' => 'required|date_format:d/m/Y',
            'data_max' => 'required|date_format:d/m/Y|after:start-date',
            'provincia' => 'required|string|max:50',
            'citta' => 'required|string|max:50',
            'indirizzo' => 'required|string|max:100',
            'cap' => 'required|string|size:5',
            'posti_letto' => 'required|numeric|min:1',
            'camere' => 'required|numeric|min:1'
        ];
    }
}
