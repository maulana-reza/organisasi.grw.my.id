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
        //
        Schema::table('organisasi_naungans', function (Blueprint $table) {
            $table->foreignId('organisasi_id')->nullable()->change();
            $table->foreignId('provinsi_id')->nullable()->change();
        });

        // kabupaten_kotas
        Schema::table('kabupaten_kotas', function (Blueprint $table) {
            $table->foreignId('provinsi_id')->nullable()->change();
        });

        // alamat_kantors
        Schema::table('alamat_kantors', function (Blueprint $table) {
            $table->foreignId('provinsi_id')->nullable()->change();
            $table->foreignId('kabupaten_kota_id')->nullable()->change();
        });

        // anggotas
        Schema::table('anggotas', function (Blueprint $table) {
            $table->foreignId('organisasi_id')->nullable()->change();
        });

        // jabatans
        Schema::table('jabatans', function (Blueprint $table) {
            $table->foreignId('provinsi_id')->nullable()->change();
            $table->foreignId('kabupaten_kota_id')->nullable()->change();
            $table->foreignId('anggota_id')->nullable()->change();
            $table->foreignId('alamat_kantor_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
