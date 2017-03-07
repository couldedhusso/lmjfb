<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('teachers', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('course_id')->unsigned();
          $table->integer('classroom_id')->unsigned();
          $table->enum('prof_principal', ['Oui', 'Non'])->default('Non');
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
        Schema::drop('teachers');
    }
}
