<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects_subcategories', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name_en');
            $table->string('name_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1); // 1 = active, 0 = inactive
            $table->foreignId('category_id')
                  ->constrained('projects_categories')
                  ->onDelete('cascade'); // foreign key to projects_categories.id
            $table->string('slug')->unique();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_subcategories');
    }
}
