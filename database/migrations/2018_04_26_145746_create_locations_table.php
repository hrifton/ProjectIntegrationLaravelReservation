<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('locations', function (Blueprint $table) {
			$table->increments('id');
			$table->string('slug')->nullable();
			$table->string('designation')->nullable();
			$table->string('adresse')->nullable();
			$table->integer('locality_id')->unsigned();
			$table->foreign('locality_id')->references('id')->on('localities');
			$table->string('web')->nullable();;
			$table->string('phone')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('locations');
	}
}
