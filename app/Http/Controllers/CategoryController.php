<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    

    public function index(Request $request)
    {
        //
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
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
