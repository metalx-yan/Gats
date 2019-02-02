<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalGenerateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_generate', function (Blueprint $table) {
            $table->unsignedInteger('approval_id');
            $table->unsignedInteger('generate_id');

            // $table->foreign('approval_id')->references('id')->on('approvals')->onDelete('cascade');
            // $table->foreign('generate_id')->references('id')->on('generates')->onDelete('cascade');

            $table->primary(['approval_id', 'generate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approval_generate');
    }
}
