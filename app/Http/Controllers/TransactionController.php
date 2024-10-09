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
        $to = isset($request->to) ? Carbon::parse($request->to) : null;
        $from = isset($request->from) ? Carbon::parse($request->from) : null;
        $transactions = $this->service->getTransactions(from: $from, to: $to);
        
        return Inertia::render('User/Show', [
          'transactions' => $transactions
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
