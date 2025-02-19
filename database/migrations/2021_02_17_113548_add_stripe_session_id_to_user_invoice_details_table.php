<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStripeSessionIdToUserInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_invoice_details', function (Blueprint $table) {
            $table->string('stripe_session_id')->after('coupon_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_invoice_details', function (Blueprint $table) {
            $table->dropColumn('stripe_session_id');
        });
    }
}
