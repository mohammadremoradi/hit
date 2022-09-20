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
        Schema::create('seo_registers', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('script')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('seo_registers');
    }
};
