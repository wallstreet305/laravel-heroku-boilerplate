<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stats', function (Blueprint $table) {
            $table->increments('user_stat_id');
            $table->integer('user_id_fk')->unsigned();
            $table->date('dob')->nullable();
            $table->double('height', '4', '2');
            $table->double('start_weight', '4', '2');
            $table->date('first_day_last_period')->nullable();
            $table->integer('cycle_length', false)->nullable();
            $table->date('conceive_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('user_stats', function($table){
            $table->foreign('user_id_fk')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_stats');
    }
}
