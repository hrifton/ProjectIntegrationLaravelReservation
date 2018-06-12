<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentationTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('representations', function (Blueprint $table) {
			$table->increments('id');
			$table->string('slug')->unique();
			$table->integer('show_id')->unsigned();
			$table->foreign('show_id')->references('id')->on('shows')->nullable();
			$table->datetime('when')->nullable();
			$table->integer('location_id')->unsigned();
			$table->foreign('location_id')->references('id')->on('locations')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('representations');
	}
}
