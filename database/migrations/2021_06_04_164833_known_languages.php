<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KnownLanguages extends Migration
{
    public function up()
    {
        Schema::create('known_languages',function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid');
            $table->foreignId('languageid');
            $table->integer('level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('known_languages');
    }
}
