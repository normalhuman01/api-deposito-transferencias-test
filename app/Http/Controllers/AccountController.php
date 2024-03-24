<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Models\Account;
use App\Service\AccountService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(
        AccountService $accountService
    ){
        $this->accountService = $accountService;
    }

    public function index():Collection
    {
        return $this->accountService->index();
    }

    public function store(AccountRequest $request):JsonResponse
    {
        $account = new Account($request->all());
        $this->accountService->store($account);
        return new JsonResponse("Conta criada com sucesso.");
    }   

    public function show($id):Account
    {
        return $this->accountService->show($id);
        
    }

    public function update(AccountUpdateRequest $request):JsonResponse
    {
        $newAccount= new AccountUpdateRequest($request->all());
        $newAccount=$this->accountService->update($newAccount);
        return new JsonResponse("Conta atualizada.");

    }

    public function destroy($id):JsonResponse
    {
        $this->accountService->destroy($id);
        return new JsonResponse("conta deletada.");
    }
}