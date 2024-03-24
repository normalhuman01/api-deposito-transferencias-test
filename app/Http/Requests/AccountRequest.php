<?php

namespace App\Http\Requests;

use App\Rules\DocumentRule;
use App\Rules\FullnameRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AccountRequest extends AbstractRequest
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
            'type'=>['required', Rule::in('cpf','cnpj')],
            'document'=> new DocumentRule,
            'fullname'=> new FullnameRule,
            'email' => 'required|email|unique:App\Models\Account,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ];
    }
    public function messages()
    {
        return[
            'type.in'=>'O tipo de conta deve ser CPF ou CNPJ.',
            'document.unique'=>'O número de documento já existe',
            'fullname.min'=>'O nome precisa ter no mínimo 6 caracteres.',
            'email.required'=>'O e-mail é obrigatório.',
            'email.email'=>'O e-mail precisa ser válido',
            'email.unique'=>'O email já existe',
            'password.min'=>'O password precisa ter 8 caracteres',
            'password'=>'O password precisa ter 8 caracteres',
        ];
    }

}
