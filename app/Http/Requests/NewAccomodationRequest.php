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
            'titolo' => 'required|min:4|max:25',
            'descrizione' => 'required|max:5000',
            'tipo' => 'required',
            'eta_min' => 'required',
            'eta_max' => 'required',
            'sesso' => 'required',
            'prezzo' => 'required',
            'superficie' => 'required',
            'data_min' => 'required',
            'data_max' => 'required',
            'provincia' => 'required',
            'citta' => 'required',
            'indirizzo' => 'required',
            'cap' => 'required',
            'posti_letto' => 'required',
            'camere' => 'required'
        ];
    }
}
