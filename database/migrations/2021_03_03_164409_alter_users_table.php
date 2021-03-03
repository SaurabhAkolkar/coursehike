<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('awards')->nullable()->after('detail');
            $table->string('portfolio_links')->nullable()->after('detail');
            $table->string('yoe')->nullable()->after('detail');
            $table->string('expertise')->nullable()->after('detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('awards');
            $table->dropColumn('portfolio_links');
            $table->dropColumn('yoe');
            $table->dropColumn('expertise');
        });
    }
}
