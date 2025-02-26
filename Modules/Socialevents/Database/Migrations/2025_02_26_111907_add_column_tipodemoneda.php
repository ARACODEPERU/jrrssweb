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
        Schema::table('even_event_donations', function (Blueprint $table) {
            $table->string('tipo_moneda', 3)->nullable()->comment('tipo de moneda PEN soles USD dolares');
            $table->string('origen_pago')->default('MercadoPago')->nullable()->comment('de que pasarela viene el pago');
            $table->double('comision', 8, 2)->nullable()->comment('si existe una comision por hacer eun pago');
            $table->double('comision_fija', 8, 2)->nullable()->comment('si cobran un pago fijo adicional');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('even_event_donations', function (Blueprint $table) {
            $table->dropColumn('comision_fija');
            $table->dropColumn('comision');
            $table->dropColumn('origen_pago');
            $table->dropColumn('tipo_moneda');
        });
    }
};
