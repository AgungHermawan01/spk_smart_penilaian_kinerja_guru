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
        Schema::create('bobot_subkriterias', function (Blueprint $table) {
            $table->id();
            $table->integer('batas_atas');
            $table->integer('batas_bawah');
            $table->integer('bobot');
            $table->bigInteger('subkriteria_id')->unsigned();
            $table->timestamps();

            $table->foreign('subkriteria_id')->references('id')->on('subkriterias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkriteria_bobots');
    }
};
