<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('full_name', 255)->nullable();
            $table->string('email',191)->unique();
            $table->string('password',255)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('gplus_reference',191)->unique()->nullable();
            $table->string('facebook_reference',191 )->unique()->nullable();
            $table->string('location',255)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('uuid', 191)->nullable()->unique(); /// User unique id
            $table->string('timezone',15)->nullable();
            $table->boolean('forgot_password_request')->nullable();
            $table->string('image_path',255)->nullable();
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
