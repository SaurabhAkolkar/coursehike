<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWatchProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_watch_progress', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->constrained();
            $table->integer('course_id')->nullable()->constrained();
            $table->integer('class_id')->nullable()->constrained();
            $table->char('current_position', 10)->nullable();
            $table->boolean('completion')->nullable();
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
        Schema::dropIfExists('user_watch_progress');
    }
}
