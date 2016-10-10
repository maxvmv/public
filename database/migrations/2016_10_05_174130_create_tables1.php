<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Topics', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('topicname', 100)->unique;
            $table->timestamps();//создает служебные поля в таблице
        });

        Schema::create('Block', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('topicid')->unsigned();
            $table->foreign('topicid')->references('id')->on('Topics')->onDelete('cascade');
            $table->string('title', 100)->unique;
            $table->longText('content');
            $table->string('imagePath', 255);
            $table->timestamps();//создает служебные поля в таблице
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Block');
        Schema::drop('Topics');
    }
}
