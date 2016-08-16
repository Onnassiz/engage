<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationContactList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_contact_list', function(Blueprint $table){
            $table->increments('id');
            $table->integer('contact_id', false, true);
            $table->integer('publication_id', false, true);
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('publication_id')->references('id')->on('publications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publication_contact_list');
    }
}
