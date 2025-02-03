<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function create(Category $category)
    {
        return Inertia::render('Filter/Edit', [
            'category_id' => (int) $category->id,
        ]);
    }

     
    public function store(Request $request, Category $category)
    {
        try {
            $validated = $request->validate([
                'column_name' => 'required',
                'pattern' => 'required',
            ]);
            
            CategoryFilter::create([
                'category_id' => $category->id,
                'column_name' => $validated['column_name'],
                'pattern' => $validated['pattern'],
            ]);
            return to_route('categories.show', ['category' => $category->id], 303);
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
    public function edit(Category $category, $filter_id)
    {
        $filter = CategoryFilter::find($filter_id);
        return Inertia::render('Filter/Edit', [
            'filter' => $filter,
            'category_id' => $category->id,
        ]);
    }

    public function update(Request $request, Category $category, int $filter_id)
    {
        $filter = CategoryFilter::find($filter_id);
        $filter->update([
            'column_name' => $request->column_name,
            'pattern' => $request->pattern,
        ]);
        return to_route('categories.show', ['category' => $category->id], 303);
    }

    public function destroy(Category $category, int $filter_id)
    {
        $filter = CategoryFilter::find($filter_id);
        $filter->delete();

        return to_route('categories.show', ['category' => $category->id], 303);
    }
}
