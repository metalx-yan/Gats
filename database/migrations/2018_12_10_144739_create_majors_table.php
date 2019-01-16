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
            $table->enum('name', ['geomatika dan geospasial', 'konstruksi dan properti', 'ketenagalistrikan', 'mesin', 'komputer dan informatika', 'survei dan pemetaan', 'bangunan']);
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
