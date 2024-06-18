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
        Schema::create('product', function (Blueprint $table) {
            $table->id('pid');
            $table->string('pname' , 100);
            $table->string('pdesc');
            $table->boolean('enable');
            $table->double('pprice');
            $table->string('pimg' , 100);
            $table->integer('cid');
            $table->foreign('cid')->references('cid')->on('category');
            $table->string('cateogry')->nullable();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
