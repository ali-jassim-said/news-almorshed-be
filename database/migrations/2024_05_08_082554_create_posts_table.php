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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->text('ar_mini_description')->nullable()->default(null);
            $table->text('ar_description')->nullable()->default(null);
            $table->string('ar_author')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
