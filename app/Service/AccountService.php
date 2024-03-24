<?php

namespace App\Service;

use App\Models\Account;
use App\Repository\AccountRepository;
use Illuminate\Database\Eloquent\Collection;


class AccountService {

    protected $accountService;

    public function __construct(
        AccountRepository $accountRepository
    ){
        $this->accountRepository = $accountRepository;
    }

    public function index():Collection
    {
        return $this->accountRepository->index();
    }

    public function store(Account $account):void
    {
        $this->accountRepository->store($account);
    }

    public function show($id):Account
    {
        return $this->accountRepository->show($id); 
    }

    public function update( $newAccount):void
    {
        $account=$this->accountRepository->update($newAccount);

        $account-> update([
            'password'=>$newAccount['password'],
            'fullname'=>$newAccount['fullname']
        ]);
    }

    public function destroy($id):int
    {
        return $this->accountRepository->destroy($id); 
    }
}