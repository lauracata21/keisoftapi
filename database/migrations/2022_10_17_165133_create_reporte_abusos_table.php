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
        Schema::create('reporte_abusos', function (Blueprint $table) {
            $table->id();
            $table->string('direccion',80);
            $table->string('tipoCaso',100);
            $table->string('correoElectronico',100)->unique()->nullable();
            $table->unsignedBigInteger('fundacion_id');
            $table->foreign('fundacion_id')
                   ->references('id')->on('fundaciones')
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
        Schema::dropIfExists('reporte_abusos');
    }
};
