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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("email")->nullable();
            $table->string("phone_one")->nullable();
            $table->string("phone_two")->nullable();
            $table->string("address")->nullable();
            $table->string("instagram")->nullable();
            $table->string("telegram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("youtube")->nullable();
            $table->text("iframe")->nullable();
            $table->text("logo")->nullable();
            $table->text("logo_color")->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
