<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name_en');
            $table->string('name_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1); // 1 = active
            $table->foreignId('category_id')
                  ->constrained('projects_categories')
                  ->onDelete('cascade');
            $table->foreignId('subcategory_id')
                  ->nullable()
                  ->constrained('projects_subcategories')
                  ->onDelete('set null');
            $table->string('slug')->unique();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}
