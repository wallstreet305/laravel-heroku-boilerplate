<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_appointments', function (Blueprint $table) {
            $table->increments('weekly_appointment_id');
            $table->string('title')->nullable();
            $table->string('overview')->nullable();
            $table->string('detail')->nullable();
            $table->integer('week_no')->nullable();
            $table->string('appointment_type')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('weekly_appointments');
    }
}
