<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            "fullname"=>"seed um",
            "type"=>'cnpj',
	        "document"=>"12312312322222",
            "email"=>Str::random(8)."@gmail.com",
            "password"=>Hash::make('password'),
            "balance"=>3000
        ]);
    
        DB::table('account')->insert([
            "fullname"=>"seed dois",
            "type"=>"cpf",
	        "document"=>"11234234323",
            "email"=>Str::random(8)."@gmail.com",
            "password"=>Hash::make('password'),
            "balance"=>3000
        ]);

        DB::table('account')->insert([
            "fullname"=>"seed tres",
            "type"=>"cpf",
	        "document"=>"55556242352",
            "email"=>Str::random(8)."@gmail.com",
            "password"=>Hash::make('password'),
            "balance"=>3000
        ]);
    }
}
