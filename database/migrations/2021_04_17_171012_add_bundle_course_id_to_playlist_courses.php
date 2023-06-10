<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBundleCourseIdToPlaylistCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playlist_courses', function (Blueprint $table) {
            $table->integer('bundle_course_id')->nullable()->after('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('playlist_courses', function (Blueprint $table) {
            $table->dropColumn('bundle_course_id');
        });
    }
}
