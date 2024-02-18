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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('telp')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('tempat_lhr')->nullable();
            $table->date('tanggal_lhr')->nullable();
            $table->string('no_kartu')->nullable();
            $table->string('role')->default('User');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->dropSoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
