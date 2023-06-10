<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('awards', 255)->nullable()->after('role');
            $table->string('yoe', 255)->nullable()->after('role');
            $table->string('expert_in', 255)->nullable()->after('role');
            $table->string('display_name', 255)->nullable()->after('lname');
            $table->longText('portfolio_links', 255)->nullable()->after('role');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('awards', 255)->nullable()->after('role');
            $table->string('yoe', 255)->nullable()->after('role');
            $table->string('expert_in', 255)->nullable()->after('role');
            $table->string('display_name', 255)->nullable()->after('lname');
            $table->longText('portfolio_links', 255)->nullable()->after('role');
        });
    }
}
