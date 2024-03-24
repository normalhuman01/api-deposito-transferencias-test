<?php

namespace App\Repository;

use App\Models\Account;

class BalanceRepository{ 

    public function deposit($balance):Account
    {
        return Account::findorfail($balance['id']);

    }

    public function paymentPayer($transaction):Account
    {
        return Account::findorfail($transaction['payer']);
    }
    public function paymentPayee($transaction)
    {
        return Account::findorfail($transaction['payee']);
    }
}