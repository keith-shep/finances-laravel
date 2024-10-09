<?php

namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;
use Inertia\Inertia;

class TransactionService
{
    public function getTransactions(?Carbon $from, ?Carbon $to){
        $transactions = Transaction::whereBetween('transaction_date', [$from, $to])->get();
        return $transactions;
    }

   
}
