<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('message')->nullable();
            $table->datetime('duedate');
            $table->integer('progress')->nullable();
            $table->integer('wordcount')->nullable();
            $table->unsignedBigInteger('translatorid');
            $table->unsignedBigInteger('requestedby')->nullable();
            $table->unsignedBigInteger('originlanguage');
            $table->unsignedBigInteger('finallanguage');
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
        Schema::dropIfExists('translations');
    }
}
