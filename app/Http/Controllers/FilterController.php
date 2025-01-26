<?php

namespace App\Http\Controllers;

use App\Models\CategoryFilter;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FilterController extends Controller
{

    

    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

     
    public function store(Request $request)
    {
        //
    }

    public function show($category_id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category_id, $filter_id)
    {
        $filter = CategoryFilter::find($filter_id);
        return Inertia::render('Filter/Edit', [
            'filter' => $filter,
        ]);
    }

    public function update(Request $request, $filter_id)
    {
        $filter = CategoryFilter::find($filter_id);
        $filter->update([
            'column_name' => $request->column_name,
            'pattern' => $request->pattern,
        ]);   
    }

    public function destroy(string $id)
    {
        //
    }
}
