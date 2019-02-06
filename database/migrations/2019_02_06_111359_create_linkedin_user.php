<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkedinUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkedin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('linkedin_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('public_profile');
            $table->string('access_token', 1000);
            $table->string('expiry');
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
        Schema::dropIfExists('linkedin_user');
    }
}
