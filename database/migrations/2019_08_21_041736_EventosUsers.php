<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventosUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('evento_user',function (Blueprint $table){
			$table->increments('id')->unique()->index()->unsigned();
			$table->integer('evento_id')->unsigned()->index();
			$table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			/**
			 * Type your addition here
			 *
			 */
        });
        Schema::create('evento_user',function (Blueprint $table){
			$table->foreign('user_id')->references('id')->on('users');
			/**
			 * Type your addition here
			 *
			 */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('evento_user');
    }
}
