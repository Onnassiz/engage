<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    public function up()
    {
        Schema::create('organizations', function(Blueprint $table){
            $table->increments('id');
            $table->string('organization')->unique();
            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('organization');
    }
}
