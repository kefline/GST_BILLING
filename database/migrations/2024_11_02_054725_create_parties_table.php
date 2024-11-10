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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->integer('parties_types_id');
            $table->string('full_name');
            $table->string('phone');
            $table->string('address');
            $table->string('account_no');
            $table->string('account_holder_name');
            $table->string('bank_name');
            $table->string('ifsc');
            $table->string('branch_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
