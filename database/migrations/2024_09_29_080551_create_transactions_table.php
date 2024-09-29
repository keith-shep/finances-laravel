<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date');
            $table->string('reference');
            $table->float('amount');
            $table->string('ref1');
            $table->string('ref2');
            $table->string('ref3');
            $table->string('description');
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
