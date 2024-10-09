<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Inertia\Inertia;

class TransactionController extends Controller
{

    private TransactionService $service; 

    public  function __construct(){
        $this->service = new TransactionService();
    }

    public function index(Request $request)
    {
        $from = isset($request->from) ? Carbon::parse($request->from) : null;
        $to = isset($request->to) ? Carbon::parse($request->to) : null;

        $transactions = $this->service->getTransactions(from: $from->startOfMonth(), to: $to->endOfMonth());

        return Inertia::render('Transaction/Index', [
            'transactions' => $transactions,
            'from' => isset($from) ? $from->format('Y-m') : null,
            'to' => isset($to) ? $to->format('Y-m') : null,
        ]);
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
