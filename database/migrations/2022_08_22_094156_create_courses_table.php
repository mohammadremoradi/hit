<?php

use App\Enums\LangType;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->text('img');
            $table->string('semester')->nullable();
            $table->string('credit')->nullable();
            $table->string('duration')->nullable();
            $table->text('summary');
            $table->text('video')->nullable();
            $table->string('lang')->default(LangType::English);
            $table->string('course_lang');
            $table->string('start_course_day')->nullable();
            $table->string('start_course_month')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('courses');
    }
};
