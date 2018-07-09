<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('manage_id');
            $table->integer('id_number');
            $table->integer('member_number');
            $table->integer('mobile_number');
            $table->integer('divided_balance');
            $table->string('name');
            $table->string('email');
            $table->integer('shares');
            
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
        Schema::dropIfExists('admins');
    }
}
