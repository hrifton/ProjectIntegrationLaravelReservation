<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtisteTypeShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artiste_type_show', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_id')->references('id')->on('shows')->nullable();
            $table->integer('artiste_type_id')->references('id')->on('type_artistes')->nullable();
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
        Schema::dropIfExists('artiste_type_show');
    }
}
