<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextUserTable extends Migration
{
    public function up()
    {
        Schema::create('text_user', function (Blueprint $table) {
            $table->unsignedBigInteger('text_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('text_id')->references('id')->on('texts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('text_user');
    }
}

