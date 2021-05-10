<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_videos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_class_id');
            $table->string('vid_lang');
            $table->string('lang_code');
            $table->string('video_path');
            $table->string('stream_url');
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
        Schema::dropIfExists('addition_video');
    }
}
