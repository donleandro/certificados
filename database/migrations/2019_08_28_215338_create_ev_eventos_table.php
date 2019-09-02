<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ev_eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('estado')->nullable();
            $table->string('nombre');
            $table->longText('descripcion')->nullable();            
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('imagen')->unique();
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
        Schema::dropIfExists('ev_eventos');
    }
}
