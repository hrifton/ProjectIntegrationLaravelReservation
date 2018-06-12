<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeArtistes extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('type_artistes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('artiste_id')->unsigned();
			$table->foreign('artiste_id')->references('id')->on('artistes');
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('types');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('type_artiste');
	}
}
