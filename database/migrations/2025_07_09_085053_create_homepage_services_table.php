<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_services', function (Blueprint $table) {
            $table->id();                             // Auto-incrementing ID
            $table->string('title_en');               // English title of the service (e.g., "Tailor-made for your needs")
            $table->string('title_ar');               // Arabic title of the service
            $table->string('icon_path')->nullable();  // Path to icon (e.g., "icon-path/tailor.svg")
            $table->integer('order')->default(0);     // Sorting order for services
            $table->enum('status', ['active', 'inactive'])->default('active');  // Active or inactive service status
            $table->timestamps();                     // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_services');
    }
}
