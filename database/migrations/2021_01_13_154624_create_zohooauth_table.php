<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZohooauthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zohooauth', function (Blueprint $table) {
            $table->id();
            $table->string('useridentifier');
            $table->string('accesstoken');
            $table->string('refreshtoken');
            $table->bigInteger('expirytime');
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
        Schema::dropIfExists('zohooauth');
    }
}
