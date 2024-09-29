<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TransactionController extends Controller
{
    
    public function index()
    {
        $id = 1;
        return view('finances', [
            // 'user' => User::findOrFail($id)
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
