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
        ])->categoryFilters()->createMany([
            [
                'column_name' => 'ref1',
                'pattern' => 'AMAZON',
            ],
            [
                'column_name' => 'ref1',
                'pattern' => 'LAZADA',
            ]
        ]);

        Category::create([
            'name' => CategoryTypes::Groceries,
        ])->categoryFilters()->createMany([
            [
                'column_name' => 'ref1',
                'pattern' => 'NTUC',
            ],
            [
                'column_name' => 'ref2',
                'pattern' => 'NTUC',
            ],
            [
                'column_name' => 'ref1',
                'pattern' => 'FAIRPRICE',
            ],
            [
                'column_name' => 'ref1',
                'pattern' => 'REDMART',
            ]
        ]);

        Category::create([
            'name' => CategoryTypes::DiningOut,
        ])->categoryFilters()->createMany([
            [
                'column_name' => 'ref1',
                'pattern' => 'KIN BA BA',
            ],
            [
                'column_name' => 'ref1',
                'pattern' => "STUFF'D",
            ],
            [
                'column_name' => 'ref1',
                'pattern' => "MCDONALD'S",
            ],
            [
                'column_name' => 'ref1',
                'pattern' => 'BAD HABITS',
            ], 
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
