<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Relación con la tabla usuarios
            $table->bigInteger('user_id')->unsigned();

            //Creacion de los atributos
            $table->string('title');
            $table->string('slug')->unique();

            $table->string('image')->nullable();

            $table->text('body');
            $table->text('iframe')->nullable();

            $table->timestamps();

            //Establecer la relación con la tabla de usuarios
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
