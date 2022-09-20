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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('title')->nullable();
            $table->string('lang')->default(LangType::English);
            $table->text('text_one')->nullable();
            $table->text('text_two')->nullable();
            $table->string('pr_title_one')->nullable();
            $table->string('pr_title_two')->nullable();
            $table->string('pr_title_three')->nullable();
            $table->string('pr_title_four')->nullable();
            $table->string('pr_title_five')->nullable();
            $table->string('pr_title_six')->nullable();
            $table->text('pr_text_one')->nullable();
            $table->text('pr_text_two')->nullable();
            $table->text('pr_text_three')->nullable();
            $table->text('pr_text_four')->nullable();
            $table->text('pr_text_five')->nullable();
            $table->text('pr_text_six')->nullable();
            $table->text('need_one')->nullable();
            $table->text('need_two')->nullable();
            $table->text('need_three')->nullable();
            $table->text('need_four')->nullable();
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
        Schema::dropIfExists('admissions');
    }
};
