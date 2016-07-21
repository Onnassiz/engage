<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('state_of_origin')->references('state')->on('states')->onUpdate('cascade');
            $table->foreign('current_state')->references('state')->on('states')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function(Blueprint $table){
            $table->dropForeign('contacts_user_id_foreign');
            $table->dropForeign('contacts_state_of_origin_foreign');
            $table->dropForeign('contacts_current_state_foreign');
        });
    }
}
