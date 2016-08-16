<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_temp', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id',false,true);
            $table->integer('number',false,true);
            $table->string('firstname')->nullable();
            $table->string('surname')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('sex')->nullable();
            $table->string('organization')->nullable();
            $table->string('function')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_state')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('telephone_1')->nullable();
            $table->string('telephone_2')->nullable();
            $table->string('periodicity')->nullable();
            $table->string('media')->nullable();
            $table->string('tags')->nullable();
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
        Schema::drop('contacts_temp');
    }


}
