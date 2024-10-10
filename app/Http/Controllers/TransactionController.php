<?php

namespace App\Http\Controllers;

use App\Jobs\ImportCsv;
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
        $from = isset($request->from) ? Carbon::parse($request->from) : null;
        $to = isset($request->to) ? Carbon::parse($request->to) : null;

        $transactions = $this->service->getTransactions(from: $from, to: $to);
        $dictionary = $this->service->tranformToDictionary($transactions);
        $pie_chart_data = $this->service->formatPieChartData($dictionary);

        return Inertia::render('Transaction/Index', [
            'transactions' => $transactions,
            'from' => isset($from) ? $from->format('Y-m') : null,
            'to' => isset($to) ? $to->format('Y-m') : null,
            'pie_chart_data' => $pie_chart_data,
        ]);
    }

    public function importCsv(Request $request)
    {
        $file = $request->file('file');
        try {
            // ImportCsv::dispatch($file);
            return $this->service->importCsv($file);
        } catch (Exception $e) {
            return $e->getMessage();
        }

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

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
