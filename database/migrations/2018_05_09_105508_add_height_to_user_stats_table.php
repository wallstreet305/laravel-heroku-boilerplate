<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHeightToUserStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_stats', function (Blueprint $table) {
            $table->dropColumn(['height', 'start_weight']);
        });
        Schema::table('user_stats', function (Blueprint $table) {
            $table->double('height', '6', '2')->before('first_day_last_period')->nullable();
            $table->double('start_weight', '6', '2')->before('first_day_last_period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_stats', function (Blueprint $table) {
            $table->dropColumn(['height', 'start_weight']);
        });
    }
}
