<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'cpf' => 'required|digits:11',
            'addresses.*.cep' => 'required|numeric|digits:8',
            'addresses.*.logradouro' => 'required',
            'type' => 'required|numeric'
        ];
    }
}
