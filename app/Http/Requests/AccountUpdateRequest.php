<?php

namespace App\Http\Requests;

use App\Rules\FullnameRule;
use Illuminate\Validation\Rules\Password;

class AccountUpdateRequest extends AbstractRequest
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
            'id'=>'required',
            'fullname'=> ['required',new FullnameRule],
            'password' =>['required',Password::min(8)]
        ];
    }
    public function messages()
    {
        return[
            'fullname.min'=>'O nome precisa ter no mínimo 6 caracteres.',
            'password.min'=>'O password precisa ter 8 caracteres',
            'password'=>'O password precisa ter 8 caracteres',
        ];
    }
}
