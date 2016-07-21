<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactOrganization extends Migration
{

    public function up()
    {
        Schema::create('contact_organizations',function(Blueprint $table){
            $table->increments('id');
            $table->integer('organization_id', false, true);
            $table->integer('contact_id', false, true);
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }


    public function down()
    {
        Schema::drop('contact_organizations');
    }
}
