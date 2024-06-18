<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->id('ssid');
            $table->string('title' , 200);
            $table->string('subtitle' , 200);
            $table->text('text' , 500);
            $table->boolean('enable');
            $table->string('link', 200);
            $table->string('img' , 100);
            $table->integer('ssorder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
