<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('classrooms', function(Blueprint $table){
          $table->increments('id');
          $table->string('classroom_name');
          $table->string('cycle_id');
          // $table->string('buildinglevel');
          // $table->string('classroomlocationname')->nullable();
          // $table->text('classroomdescription')->nullable();
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
        Schema::drop('classrooms');
    }
}
