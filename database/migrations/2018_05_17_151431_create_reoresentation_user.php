<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReoresentationUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representation_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('represenation_id')->references('id')->on('representations')->nullable();
            $table->integer('user_id')->references('id')->on('users')->nullable();
            $table->integer('place');

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
        Schema::dropIfExists('representation_user');
    }
}
