<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnerAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('learner_announcements')){

            Schema::create('learner_announcements', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id');
                $table->text('title');
                $table->text('short_description');
                $table->text('long_description');
                $table->text('preview_image');
                $table->text('stream_video');
                $table->char('layout');
                $table->enum('status',['1','0'])->nullable();
                $table->timestamps();
            });
            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learner_announcements');
    }
}
