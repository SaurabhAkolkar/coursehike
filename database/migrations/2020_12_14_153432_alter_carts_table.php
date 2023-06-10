<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('course_id', 'category_id','price','class_id','distype','bundle_id','type','offer_price','disamount'))
        {
            Schema::table('carts', function (Blueprint $table) {
                $table->dropColumn('course_id');
                $table->dropColumn('category_id');
                $table->dropColumn('price');
                $table->dropColumn('class_id');
                $table->dropColumn('distype');
                $table->dropColumn('bundle_id');
                $table->dropColumn('type');
                $table->dropColumn('offer_price');
                $table->dropColumn('disamount');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('cart_id');
            $table->integer('course_id');
            $table->integer('class_id')->nullable();
            $table->integer('category_id');
            $table->integer('purchase_type');
            $table->float('price', 10, 0);
            $table->float('offer_price', 10, 0)->nullable();
            $table->float('disamount', 10, 0)->nullable();
            $table->integer('bundle_id');
        });
    }
}
