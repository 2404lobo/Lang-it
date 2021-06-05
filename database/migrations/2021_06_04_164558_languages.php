<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Languages extends Migration
{
    public function up()
    {
        Schema::create('languages',function (Blueprint $table) {
            $table->id();
            $table->string('shortname');
            $table->string('fullname');
        });
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
