<?php

namespace App\Service;

use App\Repository\BalanceRepository;
use Illuminate\Http\JsonResponse;


class BalanceService {

    protected $balanceRepository;

    public function __construct(
        BalanceRepository $balanceRepository
    ){
        $this->balanceRepository = $balanceRepository;
    }

    public function deposit($balance):void
    {
        $account=$this->balanceRepository->deposit($balance);

        $account->update([
            'balance'=>$balance['deposit']+$account->balance
        ]);
    }

    public function payment($transaction):JsonResponse
    {
        $value=$transaction['value'];

        $payerObject=$this->balanceRepository->paymentPayer($transaction);
        $payeeObject=$this->balanceRepository->paymentPayee($transaction);
        

        if ($payerObject->balance < $value) {
            return new JsonResponse("saldo insuficiente.");
        } 
        if ($value<=0) {
            return new JsonResponse("O valor da transferência precisa ser positivo");
        }
        if ($payerObject['type'] == 'cnpj') {
            return new JsonResponse("Transferencias só para CPF.");
        }

        $payerObject->update([
            'balance'=>$payerObject->balance-$value
        ]);
        $payeeObject->update([
            'balance'=>$payeeObject->balance+$value
        ]);
        return new JsonResponse("Transação efetuada.");

    }
}