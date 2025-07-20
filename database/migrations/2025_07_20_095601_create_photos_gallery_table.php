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
        Schema::create('photos_gallery', function (Blueprint $table) {
            $table->id();
            $table->string('image_title_en')->nullable(); // For storing image path
            $table->string('image_title_ar')->nullable(); // For storing image path
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('images')->nullable(); // For storing image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos_gallery');
    }
};
