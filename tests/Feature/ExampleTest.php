<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use App\Models\Transaction;
use App\Services\TransactionService;
use Carbon\Carbon;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function xtest_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCategorizeTransactions(): void
    {
        $service = new TransactionService();
        $transaction1 = Transaction::create([
            'transaction_date' => Carbon::now(),
            'ref2' => 'TO: PAK DIN KEDAI KOPI'
        ]);

        $transaction2 = Transaction::create([
            'transaction_date' => Carbon::now(),
            'ref2' => "TO: DAN'S KITCHEN"
        ]);

        $transactions = collect([$transaction1, $transaction2]);

        $category = Category::create([
            'name' => 'amoy'
        ]);
    
        $category->categoryFilters()->create([
            'column_name' => 'ref2',
            'pattern' => 'TO: PAK DIN KEDAI KOPI',
        ]);

        $category->categoryFilters()->create([
            'column_name' => 'ref2',
            'pattern' => "TO: DAN'S KITCHEN",
        ]);

        $categorized_transactions = $service->categorize($transactions);
        $categorized_transaction1 = $categorized_transactions->where('ref2', 'TO: PAK DIN KEDAI KOPI')->last();
        $categorized_transaction2 = $categorized_transactions->where('ref2', "TO: DAN'S KITCHEN")->last();
        
        $this->assertSame($categorized_transaction1->category_id, $category->id);
        $this->assertSame($categorized_transaction2->category_id, $category->id);


    }

    public function xtestFilters() {
        $service = new TransactionService();
        $transactions = Transaction::all();
        $category = Category::create([
            'name' => 'amoy'
        ]);
        $category->categoryFilters()->create([
            'column_name' => 'ref2',
            'pattern' => 'TO: PAK DIN KEDAI KOPI',
        ]);

        $category->categoryFilters()->create([
            'column_name' => 'ref2',
            'pattern' => "TO: DAN'S KITCHEN",
        ]);
        $service->filter($category);
        

    }
}
