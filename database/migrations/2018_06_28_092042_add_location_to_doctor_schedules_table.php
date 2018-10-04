<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationToDoctorSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_schedules', function (Blueprint $table) {
            //
            $table->double('latitude')->default('0.0')->nullable();
            $table->double('longitude')->default('0.0')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_schedules', function (Blueprint $table) {
            //
            Schema::dropIfExists('doctor_schedules');
        });
    }
}
