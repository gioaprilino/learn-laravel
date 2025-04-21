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
        Schema::create('dosentis', function (Blueprint $table) {
            $table->id(); // kolom id otomatis auto-increment
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('nohp');
            $table->text('alamat');
            $table->string('bidang');
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosentis');
    }
};
