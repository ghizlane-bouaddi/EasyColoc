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
        Schema::create('_expense_user', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
             $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('expense_user')->constrained('expenses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_expense_user');
    }
};
