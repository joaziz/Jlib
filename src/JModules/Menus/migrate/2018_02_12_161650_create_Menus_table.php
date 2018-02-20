<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {

            $table->increments('id');


            $table->string("name", 190);
            $table->string("link",190);
            $table->string("icon", 20)->nullable();
            $table->integer("order")->default(0);
            $table->text("link_attr")->nullable();
            $table->string("type", 190)->nullable();

            $table->integer("parent_id")->default(0);
            $table->string("auth", 190)->nullable();


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
        Schema::drop('menus');
    }

}