<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id('id_organisasi');
            $table->string('nama_organisasi')->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->string('peran')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        Schema::create('organisasi_naungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')->nullable()->constrained('organisasis')->nullOnDelete();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->nullOnDelete();
            $table->integer('jumlah_anggota')->nullable();
            $table->timestamps();
        });
        Schema::create('provinsis', function (Blueprint $table) {
            $table->id('id_provinsi');
            $table->string('nama_provinsi')->nullable();
            $table->timestamps();
        });
        Schema::create('kabupaten_kotas', function (Blueprint $table) {
            $table->id('id_kabupaten_kota');
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->nullOnDelete();
            $table->string('nama_kabupaten')->nullable();
            $table->timestamps();
        });
        Schema::create('alamat_kantors', function (Blueprint $table) {
            $table->id('id_alamat_kantor');
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->nullOnDelete();
            $table->foreignId('kabupaten_kota_id')->nullable()->constrained('kabupaten_kotas')->nullOnDelete();
            $table->text('alamat')->nullable();
            $table->enum('type', ['kantor kabupaten', 'kantor provinsi', 'kantor pusat'])->nullable();
            $table->timestamps();
        });
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id('id_anggota');
            $table->foreignId('organisasi_id')->nullable()->constrained('organisasis')->nullOnDelete();
            $table->string('nama_anggota')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->enum('jabatan', [
                'ketua umum', 'ketua wilayah', 'sekretaris', 'wakil sekretaris',
                'bendahara', 'wakil bendahara', 'bidang humas', 'bidang sosial', 'bidang pendidikan', 'anggota'
            ])->nullable();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->nullOnDelete();
            $table->foreignId('kabupaten_kota_id')->nullable()->constrained('kabupaten_kotas')->nullOnDelete();
            $table->foreignId('anggota_id')->nullable()->constrained('anggotas')->nullOnDelete();
            $table->foreignId('alamat_kantor_id')->nullable()->constrained('alamat_kantors')->nullOnDelete();
            $table->timestamps();
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
