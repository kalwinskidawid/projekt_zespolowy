<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('no action');
            $table->string("school_name");
            $table->unsignedBigInteger('school_type_id');
            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_types')
                ->onDelete('no action');
            $table->date("start_date");
            $table->date("end_date");
            $table->text("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
