<?php

namespace App\Repository;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;


class AccountRepository{  

    public function index():Collection
    {
        return Account::all();
    }

    public function store(Account $account):Account
    {
        return Account::create($account->getAttributes());
    }
    
    public function show($id)
    {
        return Account::findorfail($id);
    }   

    public function update($account)
    {
       return $account=Account::findorfail($account['id']);
        
    }

    public function destroy($id)
    {
        return Account::destroy($id);
    }
}