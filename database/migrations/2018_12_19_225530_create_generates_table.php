<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generates', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('days', ['senin', 'selasa', 'rabu', 'kamis', 'jumat']);
            $table->time('start');
            $table->time('end');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::table('generates', function (Blueprint $table) {
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('lesson_id');

            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generates');
    }
}
