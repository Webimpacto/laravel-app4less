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
            $table->string('token');
            $table->string('uuid');
            $table->string('user_agent');
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::drop('app4less');
    }
}
