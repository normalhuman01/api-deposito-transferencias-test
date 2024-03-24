<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;


class AccountTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function test_creat()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>'conta certa',
	        "document"=>"87654839284402",
            'type'=>'cnpj',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "password_confirmation"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(200);
    }

    public function test_update()
    {
        $response = $this->put(route('conta.atualizar'),[
            "id"=>'1',
            "fullname"=>'conta atualizada',
            "password"=>'98765654',
        ]);

        $response->assertStatus(200);
    }

    public function test_index()
    {
        $response = $this->get(route('conta.home'),[
        ]);

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $response = $this->get(route('conta.show',1),[
        ]);

        $response->assertStatus(200);
    }

    public function test_del()
    {
        $response = $this->delete(route('conta.del',3),[
        ]);

        $response->assertStatus(200);
    }

    public function test_creatErrorName()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"erro",
	        "document"=>"12345678909876",
            'type'=>'cnpj',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrortype()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"usuario dois",
	        "document"=>"12343234565",
            'type'=>'cptl',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorEmail()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"usuario tres",
	        "document"=>"12343456123",
            'type'=>'cpf',
            "email"=>Str::random(8),
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorPassword()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"empresa quatro",
	        "document"=>"98767898765654",
            'type'=>'cnpj',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'8dm4hd8f',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorBalance()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"usuario cinco",
	        "document"=>"19872837573",
            'type'=>'cpf',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>""
        ]);

        $response->assertStatus(400);
    }
    
    public function test_updateErrorId()
    {
        $response = $this->put(route('conta.atualizar'),[
            "id"=>'0',
            "fullname"=>"usuario cinco",
            "password"=>'12345678',
        ]);

        $response->assertStatus(404);
    }
    public function test_updateErrorNane()
    {
        $response = $this->put(route('conta.atualizar'),[
            "id"=>'1',
            "fullname"=>"usuario",
            "password"=>'12345678',
        ]);

        $response->assertStatus(400);
    }

    public function test_updateErrorPassword()
    {
        $response = $this->put(route('conta.atualizar'),[
            "id"=>'1',
            "fullname"=>"usuario",
            "password"=>'123',
        ]);

        $response->assertStatus(400);
    }
}