<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceCurrencyToUserSubscriptionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_subscription_invoices', function (Blueprint $table) {
            $table->char('bkp_invoice_currency')->nullable()->after('invoice_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_subscription_invoices', function (Blueprint $table) {
            $table->dropColumn('bkp_invoice_currency');
        });
    }
}
