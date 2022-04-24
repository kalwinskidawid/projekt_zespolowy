<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnownForeignLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('known_foreign_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('no action');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('no action');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')
                ->references('id')
                ->on('levels')
                ->onDelete('no action');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('known_foreign_languages');
    }
}
