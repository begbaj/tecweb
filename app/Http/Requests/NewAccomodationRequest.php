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
            'titolo' => 'required|min:4|max:100',
            'descrizione' => 'required|max:5000',
            'tipo' => 'required',
            'eta_min' => '',
            'eta_max' => '',
            'sesso' => '',
            'prezzo' => 'required|integer',
            'superficie' => 'required|integer',
            'data_min' => 'required|date',
            'data_max' => 'required|date',
            'provincia' => 'required|max:50',
            'citta' => 'required|max:50',
            'indirizzo' => 'required|max:100',
            'cap' => 'required|max:5',
            'posti_letto' => 'required|integer',
            'camere' => 'required|integer'
        ];
    }
}
