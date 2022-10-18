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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
                $table->date('fecha');
                $table->string('nombre');
                $table->text('descripcion');
                $table->time('hora');
                $table->string('foto_url');
                
                $table->unsignedBigInteger('fundacion_id');
                $table->foreign('fundacion_id')
                ->references('id')->on('fundaciones')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
};
