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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('title')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('key_words')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable(); // ✅ Added fax column here
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('carrers_email')->nullable();
            $table->string('url')->nullable();
            $table->string('location')->nullable();  // Google Maps location
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
