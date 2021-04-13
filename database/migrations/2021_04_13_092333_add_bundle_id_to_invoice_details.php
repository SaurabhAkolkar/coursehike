<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBundleIdToInvoiceDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->integer('bundle_id')->nullable()->after('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->dropColumn('bundle_id');
        });
    }
}
