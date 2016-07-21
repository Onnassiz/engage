<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsInContactsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_tags', function(Blueprint $table){
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts_tags', function(Blueprint $table){
            $table->dropForeign('contacts_tags_tag_id_foreign');
            $table->dropForeign('contacts_tags_contact_id_foreign');
        });
    }
}
