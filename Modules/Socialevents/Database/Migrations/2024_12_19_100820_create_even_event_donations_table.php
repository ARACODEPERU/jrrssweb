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
        Schema::create('even_event_donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nombres')->nullable();
            $table->decimal('monto')->nullable();
            $table->string('tipo_donacion')->nullable();
            $table->string('response_status')->nullable();
            $table->string('response_id')->nullable();
            $table->string('response_date_approved')->nullable();
            $table->json('response_payer')->nullable();
            $table->string('response_payment_method_id')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('even_event_donations');
    }
};
