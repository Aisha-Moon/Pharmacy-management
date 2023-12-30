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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('suppliers_id');
            $table->integer('invoices_id');
            $table->string('voucher_number');
            $table->date('purchase_date');
            $table->string('total_amount');
            $table->tinyInteger('payment_status')->default(1)->comment('1:pending,2:Accept,3:Cancel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
