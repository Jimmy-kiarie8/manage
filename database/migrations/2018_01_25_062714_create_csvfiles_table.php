<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('id_number');
            $table->integer('number');
            $table->integer('mobile_number');
            $table->integer('divided_balance');
            $table->string('name');
            $table->string('email');
            $table->integer('shares');
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
        Schema::dropIfExists('csvfiles');
    }
}
