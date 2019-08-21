<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Eventos.
 *
 * @author  The scaffold-interface created at 2019-08-21 04:15:56pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Eventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('eventos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('Nombre');
        
        $table->longText('descripcion');
        
        $table->date('fecha');
        
        $table->integer('hora');
        
        $table->String('imagenPromo');
        
        /**
         * Foreignkeys section
         */
        
        
        $table->timestamps();
        
        
        $table->softDeletes();
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
