<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');              // e.g., Tailor made for your needs
            $table->string('title_ar');              // Arabic version
            $table->string('icon_path')->nullable(); // e.g., icon-path/tailor.svg
            $table->integer('order')->default(0);    // for sorting order if needed
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();                    // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('features');
    }
}
