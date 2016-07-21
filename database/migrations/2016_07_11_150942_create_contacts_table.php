<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function(Blueprint $table){
            $table->increments('id');
            $table->string('key')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('surname');
            $table->string('state_of_origin');
            $table->enum('sex',['male', 'female']);
            $table->string('rank');
            $table->string('current_city');
            $table->string('current_state');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('telephone_1');
            $table->string('telephone_2');
            $table->enum('periodicity',['Daily', 'Weekly', 'Monthly', 'Annually']);
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
        Schema::drop('contacts');
    }
}
