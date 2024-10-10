<?php

namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    public function getTransactions(?Carbon $from, ?Carbon $to){
        $transactions = Transaction::when(!empty($from), fn ($query) => $query->where('transaction_date', '>=', $from->startOfMonth()))
                                    ->when(!empty($to), fn ($query) => $query->where('transaction_date', '<=', $to->endOfMonth()))
                                    ->get();
                                    
        return $transactions;
    }


    public function importCsv(UploadedFile $file): bool {
        $entries = array_map('str_getcsv', file($file));
        $STARTING_LINE = 18;
        
        DB::transaction(function() use ($entries, $STARTING_LINE) {
            foreach ($entries as $index => $entry) {
                if ($index < $STARTING_LINE) {
                    continue;
                }
                if (!isset($entry[0])) {
                    continue;
                }

                $date = Carbon::parse($entry[0]);
                $reference = $entry[1] ?? '';
                $debit_amount = isset($entry[2]) ? (float) $entry[2] : 0;
                $credit_amount = isset($entry[3]) ? (float) $entry[3] : 0;
                $ref1 = $entry[4] ?? '';
                $ref2 = $entry[5] ?? '';
                $ref3 = $entry[6] ?? '';

                
                $transaction = Transaction::create([
                    'transaction_date' => $date,
                    'reference' => $reference,
                    'credit_amount' => $credit_amount,
                    'debit_amount' => $debit_amount,
                    'ref1' => $ref1,
                    'ref2' => $ref2,
                    'ref3' => $ref3,
                ]);
            }
        });
        return true;
    }


    public function formatPieChartData(array $dictionary) {
        // labels: ['January', 'February', 'March'],
        // datasets: [{ data: [40, 20, 12] }]

        $labels = [];
        $data = [];

        foreach ($dictionary as $key => $value) {
            $labels[] = $key;
            $data[] = $value;
        }

        $datasets = [
            [
                'data' => $data,
                'backgroundColor' => ['#41B883', '#E46651', '#00D8FF', '#DD1B16']
            ]
        ];
        
        return [
            'labels' => $labels, 
            'datasets' => $datasets
        ];
    }


    public function tranformToDictionary(Collection $transactions) {
        $categories = $transactions->groupBy('reference');

        $dict = [];
        foreach($categories as $category_name => $transaction_collection) {
            $dict[$category_name] = $transaction_collection->sum('debit_amount');
        }

        return $dict;
    }

   
}
