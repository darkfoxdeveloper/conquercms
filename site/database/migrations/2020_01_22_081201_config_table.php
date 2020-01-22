<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server_name');
            $table->string('host');
            $table->string('game_port');
            $table->string('about_title');
            $table->longText('about_text');
            $table->string('links_title');
            $table->timestamps();
        });

        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('configuration_id')->unsigned();
            $table->string("name");
            $table->string("link");
            $table->timestamps();
            $table->foreign('configuration_id')->references('id')->on('configurations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
        Schema::drop('configurations');
    }
}
