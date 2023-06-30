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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained('biodatas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('tingkat', ['sd','smp','sma','diploma','sarjana','master']);
            $table->string('nama_tempat');
            $table->string('kota');
            $table->year('mulai');
            $table->year('selesai');
            $table->string('jurusan')->nullable();
            $table->string('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};
