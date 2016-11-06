<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClassePp extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

      Schema::create('classes_pp', function(Blueprint $table){
          $table->increments('id');
          $table->integer('teacher_id')->unsigned();
          $table->integer('classroom_id')->unsigned();
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
      Schema::drop('classes_pp');
  }
}
