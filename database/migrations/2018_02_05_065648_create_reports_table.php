<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('manage_id');
            $table->integer('registered')->nullable();
            $table->integer('attended')->nullable();
            $table->string('proxies')->nullable();
            $table->text('comments')->nullable();
            
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('manage_id')->references('id')->on('manages');
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
        Schema::dropIfExists('reports');
    }
}
