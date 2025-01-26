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
    public function create($category_id)
    {
        return Inertia::render('Filter/Edit', [
            'category_id' => (int) $category_id,
        ]);
    }

     
    public function store(Request $request, int $category_id)
    {
        try {
            $validated = $request->validate([
                'column_name' => 'required',
                'pattern' => 'required',
            ]);
            
            CategoryFilter::create([
                'category_id' => $category_id,
                'column_name' => $validated['column_name'],
                'pattern' => $validated['pattern'],
            ]);
        } catch (\Exception $e) {
            dd($e);
        }   
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
            'category_id' => $category_id,
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
