<?php

namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;

class TransactionService
{
    public function getTransactions(?Carbon $from, ?Carbon $to){
        $transactions = Transaction::when(!empty($from), fn ($query) => $query->where('transaction_date', '>=', $from))
                                    ->when(!empty($to), fn ($query) => $query->where('transaction_date', '<=', $to))
                                    ->get();
                                    
        return $transactions;
    }

   
}
