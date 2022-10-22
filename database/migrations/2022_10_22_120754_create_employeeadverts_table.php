<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeadvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeadverts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('no action');
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('no action');
            $table->unsignedBigInteger('contracttype_id');
            $table->foreign('contracttype_id')->references('id')->on('contracttypes')->onDelete('no action');
            $table->integer('salary_start');
            $table->string('location');
            $table->text('description')->nullable();
            $table->dateTime('end_date')->default( date('Y-m-d', strtotime('+1 month')) );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employeeadverts');
    }
}
