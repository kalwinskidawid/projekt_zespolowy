<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("profile_id");
                 $table->foreign('profile_id')
                     ->references('id')
                     ->on('profiles')
                     ->onDelete('no action');
            $table->date("start_date");
            $table->date("end_date");
            $table->string("position");
            $table->text("description");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
