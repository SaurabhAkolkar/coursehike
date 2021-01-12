<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoToFirstSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('first_sections', function (Blueprint $table) {
            $table->string('video_url', 191)->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('first_sections', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });
    }
}
