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
        Schema::create('pemohons', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);

            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->string('pekerjaan');

            $table->text('alamat');
            $table->string('rt', 5);

            $table->string('status');
            $table->unsignedTinyInteger('beristri_ke')->nullable();
            $table->string('nama_partner_sebelumnya')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
