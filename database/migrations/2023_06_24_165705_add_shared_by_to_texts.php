<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('texts', function (Blueprint $table) {
            $table->unsignedBigInteger('shared_by')->nullable();
            $table->foreign('shared_by')->references('id')->on('users');
        });
    }
    

    public function down()
    {
        Schema::table('texts', function (Blueprint $table) {
            $table->dropForeign(['shared_by']);
            $table->dropColumn('shared_by');
        });
    }
    
};
