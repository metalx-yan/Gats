<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('lesson_teacher', function (Blueprint $table) {
            $table->unsignedInteger('lesson_id');
            $table->unsignedInteger('teacher_id');

            // $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            // $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->primary(['lesson_id', 'teacher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_teacher');
    }
}
