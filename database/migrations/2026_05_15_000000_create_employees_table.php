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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // Relasi ke User login
            $table->string('nik')->unique(); //Nomor Induk Karyawan
            $table->string('name'); //Nama Karyawan
            $table->string('phone'); //Nomor Telepon Karyawan
            $table->foreignId('position_id')->nullable()->constrained()->nullOnDelete(); //Relasi ke Jabatan
            $table->foreignId('division_id')->nullable()->constrained()->nullOnDelete(); //Relasi ke Divisi
            $table->string('address'); //Alamat Karyawan
            $table->string('photo')->nullable(); //Foto Profil Karyawan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
