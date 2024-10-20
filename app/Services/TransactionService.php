<?php

namespace App\Services;

use App\Enums\DBSCodes;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    public function getTransactions(?Carbon $from, ?Carbon $to, ?array $category_ids){
        $transactions = Transaction::when(!empty($from), fn ($query) => $query->where('transaction_date', '>=', $from->startOfMonth()))
                                    ->when(!empty($to), fn ($query) => $query->where('transaction_date', '<=', $to->endOfMonth()))
                                    ->when(!empty($category_ids), fn ($query) => $query->whereIn('category_id', $category_ids))
                                    ->get();
                                    
        return $transactions;
    }


    public function importCsv(array $entries, int $starting_line): bool {
        DB::transaction(function() use ($entries, $starting_line) {
            foreach ($entries as $index => $entry) {
                if ($index < $starting_line) {
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

                $raw_string = $date . $reference . $debit_amount . $credit_amount . $ref1 . $ref2 . $ref3;
                $base64_encoded = base64_encode($raw_string);

                if (Transaction::where('base64', $base64_encoded)->exists()) {
                    continue;
                }
                
                $transaction = Transaction::create([
                    'transaction_date' => $date,
                    'reference' => $reference,
                    'credit_amount' => $credit_amount,
                    'debit_amount' => $debit_amount,
                    'ref1' => $ref1,
                    'ref2' => $ref2,
                    'ref3' => $ref3,
                    'base64' => $base64_encoded,
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


    public function tranformToDictionary(Collection $transactions, string $group_by) {
        // TODO: Clean up logic, use associations
        $transactions_by_categories = $transactions->groupBy($group_by);
        $categories = Category::whereIn('id', $transactions_by_categories->keys())->get();
        $dict = [];
        foreach($transactions_by_categories as $category_id => $transaction_collection) {
            $category = $categories->find($category_id);
            if (empty($category_id)) {
                $category_name = 'uncategorized';
            } else {
                $category_name = $category->name;
            }
            $dict[$category_name] = $transaction_collection->sum('debit_amount');
        }

        return $dict;
    }


    public function categorize(Collection $transactions): void {
        $categories = Category::with('categoryFilters')
                                ->get();

        foreach($categories as $category) {
            self::filterTransactionsBy($category);
        }

        return;        
    }


    public function filterTransactionsBy(Category $category) {
        $category_filters = $category->categoryFilters;
        $query = Transaction::query();
        foreach($category_filters as $category_filter) {
            $column_name = $category_filter->column_name;
            $pattern = $category_filter->pattern;
            $query->orWhereLike($column_name, $pattern);
        }

        return $query->update(['category_id' => $category->id]);
    }

   
}
