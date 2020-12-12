<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->double('sub_total', 8, 2);
            $table->double('taxes', 8, 2);
            $table->double('total', 8, 2);
            $table->double('discount', 8, 2)->nullable();
            $table->char('discount_type')->nullable();
            $table->char('coupon_applied')->nullable();
            $table->foreignId('coupon_id')->nullable();
            $table->char('status')->nullable();
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
        Schema::dropIfExists('user_invoice_details');
    }
}
