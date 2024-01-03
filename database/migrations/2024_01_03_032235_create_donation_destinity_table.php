<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donation_destinity', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('name');
            $table->timestamps();
        });

                // Insertar datos
                DB::table('donation_destinity')->insert([
                    [
                        'name' => 'Diezmos',
                        'description' => 'Importes para la iglesia',
                    ],
                    [
                        'name' => 'Ofrenda',
                        'description' => 'Ofrendas personales',
                    ],
                    [
                        'name' => 'Pacto',
                        'description' => 'Donación como pacto con el Sr.',
                    ],
                    [
                        'name' => 'Primicias',
                        'description' => 'Primicias',
                    ],
                ]);
    }

    public function down()
    {
        Schema::dropIfExists('donation_destinity');
    }
};
