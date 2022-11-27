<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('customer_id');
            $table->string('numeroDeSerie');
            $table->string('producto');
            $table->string('incidencia');
            $table->string('observaciones');
            $table->string('fotos')->nullable();
            $table->foreignID('responsable');
            $table->string('estado');
            $table->string('slug')->unique();
            $table->string('reparacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
