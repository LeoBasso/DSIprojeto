<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->unsignedBigInteger('user_id'); // Adiciona a coluna user_id
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); // Define a chave estrangeira
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
