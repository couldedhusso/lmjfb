<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCycle extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cycles', function(Blueprint $table){
        $table->increments('id');
        $table->integer('cycle')->unsigned();
        $table->string('cycle_classe')->nullable();
        $table->string('cycle_type')->nullable();
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
      Schema::drop('cycles');
  }
}
