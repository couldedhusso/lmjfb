<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCourseAverage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('course_average', function(Blueprint $table){
                $table->increments('id');
                $table->integer('trimestre_id')->unsigned();
                $table->integer('student_id')->unsigned();
                $table->integer('course_childs_id')->unsigned();
                $table->integer('average_grade')->unsigned();
                $table->integer('position')->unsigned()->nullable();
                $table->integer('nbre_student')->unsigned()->nullable();
                $table->string('comittee_appreciation')->nullable();
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
