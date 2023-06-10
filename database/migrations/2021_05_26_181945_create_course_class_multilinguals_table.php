<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseClassMultilingualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_class_multilinguals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->nullable();
            $table->bigInteger('class_id')->nullable();
            $table->string('vid_lang');
            $table->string('lang_code');
            $table->string('type');
            $table->string('video_path')->nullable();
            $table->string('stream_url')->nullable();
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
        Schema::dropIfExists('course_class_multilinguals');
    }
}
