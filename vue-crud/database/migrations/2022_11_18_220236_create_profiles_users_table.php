<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles_users', function (Blueprint $table) {
            $table->integer("user_id");
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->integer("profile_id");
            $table->foreign("profile_id")->references('id')->on('profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles_users');
    }
};
