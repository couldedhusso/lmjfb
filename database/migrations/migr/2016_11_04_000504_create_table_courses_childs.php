<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCoursesChilds extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

      Schema::create('course_childs', function(Blueprint $table){
          $table->increments('id');
          $table->integer('course_id')->unsigned();
          $table->string('label_course');
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
      Schema::drop('course_childs');
  }
}
