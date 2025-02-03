<?php

namespace App\Http\Controllers;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{

    

    public function index(Request $request)
    {
        $rows = Category::all(['id', 'name']);
        return view('category.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

     
    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        $filters = $category->categoryFilters;
        
        return Inertia::render('Category/Index', [
            'category_id' => $category->id,
            'category_name' => $category->name,
            'rows' => $filters,
        ]);
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
