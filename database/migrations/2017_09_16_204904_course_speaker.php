<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseSpeaker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_speaker', function (Blueprint $table) {

            $table->integer('speaker_id')->unsigned()->index();
            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');

            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_speaker');
    }
}
