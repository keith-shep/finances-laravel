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
      Schema::table('transactions', function (Blueprint $table) {
        $table->dropColumn('amount');
        $table->float('debit_amount')->nullable()->after('reference');
        $table->float('credit_amount')->nullable()->after('debit_amount');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
