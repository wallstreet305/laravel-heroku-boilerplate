<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {

            $table->increments('doctor_id');

            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('qualifications', 255)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('languages',100)->nullable();

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
        Schema::dropIfExists('doctors');
    }
}
