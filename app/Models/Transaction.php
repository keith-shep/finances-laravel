<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'base64',
        'bank_account_id'
    ];

    protected function casts(): array
    {
        return [
            'transaction_date' => 'datetime:Y-m-d',
        ];
    }

    public function bankAccount(): BelongsTo {
        return $this->belongsTo(BankAccount::class);
    }

    protected function creditAmount(): Attribute
    {
        return Attribute::make(
            get: function (float $amount) {
                if ($this->bankAccount->type == 'individual') {
                    return $amount;
                } else if ($this->bankAccount->type == 'joint') {
                    return $amount / 2;
                }
                return $amount;
            }
        );
    }

    protected function debitAmount(): Attribute
    {
        return Attribute::make(
            get: function (float $amount) {
                if ($this->bankAccount->type == 'individual') {
                    return $amount;
                } else if ($this->bankAccount->type == 'joint') {
                    return $amount / 2;
                }
                return $amount;
            }
        );
    }
}
