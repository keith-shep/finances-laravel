<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_date', 'reference', 'amount', 'ref1', 'ref2', 'ref3', 'description'];

}
