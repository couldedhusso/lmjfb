<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTests extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tests', function(Blueprint $table){
        $table->increments('id');
        $table->integer('trimestre_id')->unsigned();
        $table->integer('course_childs_id')->unsigned();
        $table->integer('classroom_id')->unsigned();
        $table->integer('max_grade_value')->unsigned();
        $table->string('test_name')->nullable();
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
      Schema::drop('tests');
  }
}
