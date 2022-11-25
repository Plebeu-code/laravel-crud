<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cpf' => 'required|digits:11',
            'addresses.*.cep' => 'required|numeric|digits:8',
            'addresses.*.logradouro' => 'required',
            'type' => 'required|numeric'
        ];
    }
}
