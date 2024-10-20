<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryFilter;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Transaction::query()->update(['category_id' => null]);
        CategoryFilter::truncate();
        Category::truncate();


        Category::create([
            'name' => 'amazon',
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'AMAZON',
        ]);

        Category::create([
            'name' => 'groceries',
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'NTUC',
        ]);
    }
}
