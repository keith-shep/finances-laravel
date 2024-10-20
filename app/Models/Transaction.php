<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date', 
        'reference', 
        'credit_amount', 
        'debit_amount',
        'ref1',
        'ref2',
        'ref3',
        'description',
        'base64'
    ];

    protected function casts(): array
    {
        return [
            'transaction_date' => 'datetime:Y-m-d',
        ];
    }
}
