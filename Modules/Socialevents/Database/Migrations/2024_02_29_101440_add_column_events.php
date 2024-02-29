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
        Schema::table('even_event_ticket_clients', function (Blueprint $table) {
            $table->string('full_surnames')->nullable();
            $table->string('price')->nullable();
            $table->string('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('even_event_ticket_clients', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('price');
            $table->dropColumn('full_surnames');
        });
    }
};
