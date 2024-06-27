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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->string('domisili');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('status_pekerjaan');
            $table->enum('minat_divisi', [
                'People Development',
                'Talent Acquisition',
                'Internal Finance',
                'Eksternal Finance',
                'Community Development',
                'Ambassador Development',
                'Eksternal Relation',
                'Community Partner',
                'Social Media Strategist',
                'Graphic Design',
                'Content Creator',
                'Web Developer',
                'Brand Ambassador',
                'Secretary'
            ]);
            $table->string('upload_cv');
            $table->string('social_media');
            $table->string('portofolio');
            $table->string('username')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
