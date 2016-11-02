<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToCoursegradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courseGrade', function(Blueprint $table){
            $table->integer('student_id');
            // $table->foreign('student_id')->references('id')->on('Student');
        });
    }
}
