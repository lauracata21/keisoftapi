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
        Schema::create('fundaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string ('direccion');
            $table->string('telefono');
            $table->unsignedBigInteger('servicio_id');
    
            $table->foreign('servicio_id')
                   ->references('id')->on('servicios')
                   ->onDelete('cascade');
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
        Schema::dropIfExists('fundaciones');
    }
};
