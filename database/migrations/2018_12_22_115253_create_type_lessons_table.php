<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->string('slug', 40)->unique();
            $table->timestamps();
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('type_lesson_id');

            $table->foreign('type_lesson_id')->references('id')->on('type_lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_lessons');
    }
}
