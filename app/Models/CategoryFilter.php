<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFilter extends Model
{
    use HasFactory;
    protected $fillable = ['column_name', 'pattern', 'category_id'];
}
