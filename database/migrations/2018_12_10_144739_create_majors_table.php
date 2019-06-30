<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 5)->unique();
            $table->enum('name', ['otomotif', 'agribisnis tanaman', 'agribisnis pengolahan hasil pertanian', 'agribisnis ternak', 'kimia', 'perikanan']);
            $table->timestamps();
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedInteger('major_id')->nullable();
            $table->foreign('major_id')->references('id')->on('majors');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majors');
    }
}
