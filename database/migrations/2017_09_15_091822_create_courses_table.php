<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->float('cost')->nullable();
            $table->dateTime('time_register')->nullable();
            $table->dateTime('time_start')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_url')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->integer('course_group_id')->unsigned()->index();
            $table->foreign('course_group_id')->references('id')->on('course_groups')->onDelete('cascade');

            $table->integer('course_type_id')->unsigned()->index();
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
