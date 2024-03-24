<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BalanceTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deposit()
    {
        $response = $this->put(route('transacao.deposito'),[
                "id"=>"1",
                "deposit"=>"500"
        ]);

        $response->assertStatus(200);
    }

    public function test_payment()
    {
        $response = $this->post(route('transacao.pagamento'),[
                "value"=>"100",
                "payer"=>"2",
                "payee"=>"1"  
        ]);

        $response->assertStatus(200);
    }

    public function test_depositErrorId()
    {
        $response = $this->put(route('transacao.deposito'),[
                "id"=>"0",
                "deposit"=>"500"
        ]);

        $response->assertStatus(400);
    }

    public function test_depositErrorValue()
    {
        $response = $this->put(route('transacao.deposito'),[
                "id"=>"0",
                "deposit"=>"-500"
        ]);

        $response->assertStatus(400);
    }

    public function test_paymentErrorCnpj()
    {
        $response = $this->post(route('transacao.pagamento'),[
                "value"=>"100",
                "payer"=>"1",
                "payee"=>"2"  
        ]);

        $response->assertStatus(200);
    }

    public function test_paymentErrorBalance()
    {
        $response = $this->post(route('transacao.pagamento'),[
                "value"=>"20000",
                "payer"=>"2",
                "payee"=>"1"  
        ]);

        $response->assertStatus(200);
    }

}
