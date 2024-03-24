<?php
 
namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;
 
class DocumentRule implements DataAwareRule, InvokableRule
{

    protected $data = [];
    /**
     * 
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */

    public function setData($data)
    {
        $this->data = $data;
 
        return $this;
    }

    public function __invoke($attribute, $value, $fail)
    {
        if (strlen($value) !== 11 && $this->data['type']=='cpf') {
            $fail('CPF precisa ter 11 caracteres');
        }

        if (strlen($value) !== 14 && $this->data['type']=='cnpj') {
            $fail('CNPJ precisa ter 14 caracteres');
        }
        
    }
}