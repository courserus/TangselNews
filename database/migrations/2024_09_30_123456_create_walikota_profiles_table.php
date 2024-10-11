<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalikotaProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('walikota', function (Blueprint $table) {
            $table->id();
            $table->string('judul');    // Field for title
            $table->string('gambar')->nullable(); // Field for image (nullable)
            $table->text('konten');    // Field for content
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('walikota');
    }
}
