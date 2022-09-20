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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('current_citizenship');
            $table->string('passport_number');
            $table->string('mother_name');
            $table->string('sex');
            $table->string('birth_day');
            $table->string('address');
            $table->string('post_code');
            $table->string('nationality');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('agent_email')->nullable();
            $table->string('degree');
            $table->string('major');
            $table->foreignId('course_id')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('passport');
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
        Schema::dropIfExists('registers');
    }
};
