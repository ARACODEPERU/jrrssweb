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
        Schema::create('donations_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_origin', ['paypal', 'mercadopago']);
            $table->enum('currency', ['USD', 'PEN', 'EUR'])->comment('Tipo de moneda usada');
            $table->decimal('gross_amount', 10, 2)->comment('Monto bruto de depósito');
            $table->decimal('net_amount', 10, 2)->comment('Monto neto que queda para la entidad o empresa');
            $table->decimal('commission', 10, 2)->comment('lo que se cobra paypal o mercadopago');
            $table->enum('status_order', ['PE', 'CA', 'SU'])->comment('PENDING, CANCELED o SUCCESSFUL');
            $table->text('email')->comment('Email del donador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations_logs');
    }
};
