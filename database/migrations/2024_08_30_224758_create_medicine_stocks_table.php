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
        Schema::create('medicine_stocks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('medicine_id')->constrained()->onDelete('cascade'); // Foreign key to medicines table
            $table->string('batch_id'); // Batch ID
            $table->date('expiry_date'); // Expiry date
            $table->integer('quantity'); // Quantity of medicine
            $table->decimal('mrp', 8, 2); // Maximum Retail Price
            $table->decimal('rate', 8, 2); // Purchase Rate
            $table->timestamps(); // created_at and updated_at columns
            $table->softDeletes(); // deleted_at column for soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_stocks');
    }
};