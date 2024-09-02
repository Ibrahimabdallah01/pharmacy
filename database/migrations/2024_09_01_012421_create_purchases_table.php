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
            $table->unsignedBigInteger('suppliers_id');
            $table->unsignedBigInteger('invoices_id');
            $table->string('voucher_number')->unique();
            $table->date('purchase_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_status', ['paid', 'pending', 'failed']);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');

            // Indexes
            $table->index('suppliers_id');
            $table->index('invoices_id');
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