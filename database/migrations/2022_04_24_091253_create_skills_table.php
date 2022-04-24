<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('level_id');
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('no action');
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->onDelete('no action');
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
        Schema::dropIfExists('skills');
    }
}
