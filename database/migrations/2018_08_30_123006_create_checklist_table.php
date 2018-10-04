<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->increments('checklist_id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('user_checklist', function (Blueprint $table) {
            $table->increments('user_checklist_id');
            $table->integer('checklist_id', false);
            $table->integer('user_id', false);
            $table->tinyInteger('checklist_status');
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
        Schema::dropIfExists('checklist');
        Schema::dropIfExists('user_checklist');
    }
}