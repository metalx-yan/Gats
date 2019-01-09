<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8)->unique();
            $table->string('name');
            $table->smallInteger('total_hours');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->year('beginning');
            $table->year('end');
            $table->timestamps();
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
