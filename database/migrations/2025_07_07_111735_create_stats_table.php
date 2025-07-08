<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');  // e.g., "Countries", "Projects", etc.
            $table->string('title_ar');  // e.g., "Countries", "Projects", etc.
            $table->string('value');  // e.g., "100+", "10,000+", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stats');
    }
}

