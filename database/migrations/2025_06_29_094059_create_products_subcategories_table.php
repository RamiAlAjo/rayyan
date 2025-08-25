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
        Schema::create('products_subcategories', function (Blueprint $table) {
            $table->id(); // id column, auto increment
            $table->string('name_en'); // English name of the subcategory
            $table->string('name_ar'); // Arabic name of the subcategory
            $table->text('description_en')->nullable(); // English description
            $table->text('description_ar')->nullable(); // Arabic description
            $table->string('image')->nullable(); // Image URL/path
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active'); // Status of the subcategory
            $table->foreignId('category_id')->constrained('products_categories')->onDelete('cascade'); // Foreign key to categories table
            $table->string('slug')->unique(); // Unique slug for subcategory URL
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_subcategories');
    }
};
