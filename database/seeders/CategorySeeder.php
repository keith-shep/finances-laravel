<?php

namespace Database\Seeders;

use App\Enums\CategoryTypes;
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
            'name' => CategoryTypes::OnlineShopping,
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'AMAZON',
        ]);

        Category::create([
            'name' => CategoryTypes::Groceries,
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'NTUC',
        ]);

        Category::create([
            'name' => CategoryTypes::Groceries,
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'FAIRPRICE',
        ]);

        Category::create([
            'name' => CategoryTypes::Groceries,
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'REDMART',
        ]);

        Category::create([
            'name' => CategoryTypes::PublicTransport,
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'BUS/MRT',
        ]);

        Category::create([
            'name' => CategoryTypes::PrivateTransport,
        ])->categoryFilters()->create([
            'column_name' => 'ref1',
            'pattern' => 'GRAB',
        ]);

        
    }
}
