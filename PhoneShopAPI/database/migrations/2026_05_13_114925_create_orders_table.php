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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // You can also use dateTime() or timestamp() depending on your needs
            $table->text('remarks')->nullable();
            $table->decimal('discount', 8, 2)->default(0);
            // Foreign key to the users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('payment_status')->default("pending"); // Could also be an enum() or boolean
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
