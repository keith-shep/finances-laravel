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
        $table->string('reference')->nullable()->change();
        $table->string('ref1')->nullable()->change();
        $table->string('ref2')->nullable()->change();
        $table->string('ref3')->nullable()->change();
        $table->string('description')->nullable()->change();
        $table->foreignId('category_id')->nullable()->change();
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
