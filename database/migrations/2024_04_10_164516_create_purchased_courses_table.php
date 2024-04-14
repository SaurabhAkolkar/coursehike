<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('user_id');
            $table->string('order_id')->nullable();
            $table->text('transaction_id', 65535)->nullable();
            $table->string('payment_method', 191)->nullable();
            $table->integer('coupon_discount')->nullable();
            $table->string('amount', 191);
            $table->string('paid_amount', 191);
            $table->string('currency', 191)->nullable();
            $table->string('currency_icon', 191)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('duration')->nullable();
            $table->text('json_response')->nullable();
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
        Schema::dropIfExists('purchased_courses');
    }
}
