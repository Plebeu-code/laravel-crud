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
        Schema::create('addresses_user', function (Blueprint $table) {
            $table->integer("user_id");
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->integer("address_id");
            $table->foreign("address_id")->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses_user');
    }
};
