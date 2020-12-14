<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscriptionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscription_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('user_id');
            $table->foreignId('subscription_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('stripe_subscription_id')->nullable();
            $table->string('stripe_invoice_id');
            $table->string('invoice_charge_id');
            $table->string('payment_intent_id')->nullable();;
            $table->string('invoice_paid');
            $table->string('status')->nullable();

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
        Schema::dropIfExists('user_subscription_invoices');
    }
}
