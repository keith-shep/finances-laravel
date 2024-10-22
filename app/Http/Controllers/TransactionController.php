<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Jobs\ImportCsv;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Inertia\Inertia;

class TransactionController extends Controller
{

    private TransactionService $service; 

    public function __construct(){
        $this->service = new TransactionService();
    }

    public function index(Request $request)
    {
        $sort_by = 'debit_amount';
        $from = isset($request->from) ? Carbon::parse($request->from) : Carbon::now();
        $to = isset($request->to) ? Carbon::parse($request->to) : Carbon::now();
        $category_ids = $request->category_ids ?? [];

        $transactions = $this->service->getTransactions(
            from: $from->startOfMonth(), 
            to: $to->endOfMonth(), 
            category_ids: $category_ids, 
            sort_by: $sort_by
        );
        $dictionary = $this->service->tranformToDictionary($transactions, 'category_id');
        $pie_chart_data = $this->service->formatPieChartData($dictionary);
        $categories = CategoryResource::collection(Category::all(['id', 'name']));
        $bank_accounts = BankAccount::all();
        
        if (empty($category_ids)) {
            $category_ids = $categories->pluck('id');
        }
        return Inertia::render('Transaction/Index', [
            'transactions' => $transactions,
            'from' => isset($from) ? $from->format('Y-m') : null,
            'to' => isset($to) ? $to->format('Y-m') : null,
            'pie_chart_data' => $pie_chart_data,
            'categories' => $categories,
            'category_ids' => $category_ids,
            'bank_accounts' => $bank_accounts,
        ]);
    }

    public function importCsv(Request $request)
    {
        $file = $request->file('file');
        if (empty($file)) {
            return 'error: please upload a csv file.';
        }

        $bank_account = BankAccount::find($request->selected_bank_account);

        // $account_name = $request->account_name;
        // $account_type = $request->account_type;
        // $bank_account = BankAccount::create([
        //     'name' => $account_name,
        //     'type' => $account_type,
        // ]);

        $starting_line_map = [
            'individual' => 18,
            'joint' => 21
        ];

        try {
            // ImportCsv::dispatch($file);
            $entries = array_map('str_getcsv', file($file));
            $STARTING_LINE = $starting_line_map[$bank_account->type];
            return $this->service->importCsv($entries, $STARTING_LINE, $bank_account);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function categorize(Request $request){
        $transactions = Transaction::all();
        $this->service->categorize($transactions);
        return to_route('finances.index', [], 303);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

     
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    public function update(Request $request, Transaction $transaction)
    {
        $category_id = $request->selected;
        $transaction->category_id = $category_id;
        $transaction->save();

        return to_route('finances.index', [], 303);
    }

    public function destroy()
    {
        Transaction::truncate();
        return to_route('finances.index', [], 303);
    }
}
