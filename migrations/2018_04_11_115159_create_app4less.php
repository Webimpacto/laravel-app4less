<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApp4Less extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app4less', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('token')->nullable();
            $table->string('uuid')->nullable();
            $table->string('user_agent')->nullable();
            $table->boolean('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app4less');
    }
}
