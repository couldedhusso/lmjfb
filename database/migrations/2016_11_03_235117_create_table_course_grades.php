<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCourseGrades extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('course_grades', function(Blueprint $table){
        $table->increments('id');
        $table->string('student_id');
        $table->string('trimestre_id');
        $table->string('test_id');
        $table->string('grade');
        $table->string('appreciation');
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
      Schema::drop('course_grades');
  }
}
