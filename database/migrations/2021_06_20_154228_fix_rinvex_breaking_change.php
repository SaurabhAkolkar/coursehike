<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixRinvexBreakingChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
      Schema::table('plan_subscriptions', function (Blueprint $table) {
         $table->renameColumn('user_id', 'subscriber_id');
         $table->renameColumn('user_type', 'subscriber_type');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('plan_subscriptions', function (Blueprint $table) {
         $table->renameColumn('subscriber_id', 'user_id');
         $table->renameColumn('subscriber_type', 'user_type');
      });
   }
}
