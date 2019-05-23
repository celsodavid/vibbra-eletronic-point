<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_recordings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projects_id');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->unique(['projects_id', 'started_at', 'ended_at']);
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
        Schema::drop('time_recording');
    }
}
