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
        Schema::create('about_uses', function (Blueprint $table) {
            $table->id();
            $table->string('title_one')->nullable();
            $table->string('title_two')->nullable();
            $table->string('title_three')->nullable();
            $table->string('title_four')->nullable();
            $table->string('title_five')->nullable();
            $table->string('title_six')->nullable();
            $table->string('title_seven')->nullable();
            $table->text('text_one')->nullable();
            $table->text('text_two')->nullable();
            $table->text('text_three')->nullable();
            $table->text('text_four')->nullable();
            $table->text('text_five')->nullable();
            $table->text('text_six')->nullable();
            $table->text('text_seven')->nullable();
            $table->text('text_eight')->nullable();
            $table->text('img_one')->nullable();
            $table->text('img_two')->nullable();
            $table->text('img_three')->nullable();
            $table->text('description')->nullable();
            $table->string('title')->nullable();
            $table->string('lang')->default(LangType::English);
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
        Schema::dropIfExists('about_uses');
    }
};
