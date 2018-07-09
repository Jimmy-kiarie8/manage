<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('manages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('email');
			$table->string('logo');
			$table->integer('number');
			$table->string('color');
            $table->string('priverage');
			$table->boolean('act');
			
            // $table->foreign('user_id')->references('id')->on('users');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('manages');
	}
}
