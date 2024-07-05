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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->date('event_date');
            $table->foreignId('kategori_wilayah_id')->constrained('kategori_wilayahs')->onDelete('cascade');
            $table->foreignId('kategori_event_id')->constrained('kategori_events')->onDelete('cascade');
            $table->string('status')->default('gratis');
            $table->text('deskripsi');
            $table->string('tempat');
            $table->text('daftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
