<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string("title", 190);
            $table->text("content");
            $table->integer("status");
            $table->text("meta");
            $table->string("slug", 190);
            $table->integer("template_id");
            $table->date("publish_date");
            $table->text("css")->nullable();
            $table->text("js")->nullable();

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
        Schema::drop('pages');
    }

}