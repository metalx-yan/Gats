<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonMajorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_major', function (Blueprint $table) {
            $table->unsignedInteger('lesson_id');
            $table->unsignedInteger('major_id');

            // $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            // $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');

            $table->primary(['lesson_id', 'major_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_major');
    }
}
