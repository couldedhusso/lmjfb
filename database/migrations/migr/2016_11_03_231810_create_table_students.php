<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function(Blueprint $table){
          $table->increments('id');
          $table->string('student_matricule');
          $table->integer('classroom_id')->unsigned();
          $table->integer('parent_id')->unsigned()->nullable();
          $table->string('student_name');
          $table->string('student_last_name');
          $table->string('student_birthdate')->nullable();
          $table->string('student_birthplace')->nullable();
          $table->enum('student_sexe', ['M', 'F'])->default('F');
          $table->enum('student_redoublant', ['Oui', 'Non'])->default('Non');
          $table->enum('student_affecte', ['Oui', 'Non'])->default('Oui');
          $table->string('responsable_student')->nullable();
          $table->string('contact_responsable_student')->nullable();
          $table->string('student_regime', 45)->nullable();
          $table->string('student_interne', 45)->nullable();

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
        Schema::drop('students');
    }
}
