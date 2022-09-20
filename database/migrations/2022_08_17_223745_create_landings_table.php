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
        Schema::create('landings', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slider_text_one')->nullable();
            $table->text('slider_image')->nullable();
            $table->text('about_us_text')->nullable();
            $table->text('about_us_video')->nullable();
            $table->string('lang')->default(LangType::English);
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
        Schema::dropIfExists('landings');
    }
};
