<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoefficientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('course_coefficient', function(blueprint $t){
            $t->string('cycle_classe');
            $t->integer('course_child_id');
            $t->string('serie', 2);
            $t->integer('coefficient');

             $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('course_coefficient');
    }
}
