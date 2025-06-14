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
        Schema::create('surat', function (Blueprint $table) {
            $table->integer('id_surat',true,false)->nullable(false);
            $table->integer('id_jenis_surat',false,false)
                        ->nullable(false)
                        ->index('idJnsSurat');
            $table->integer('id_user',false,false)
                        ->nullable(false)
                        ->index('idUser');
            $table->date('tanggal_surat')->nullable(false)
                        ->default('2025-01-01');
            $table->date('nomor_surat')->nullable(false);
            $table->text('ringkasan');
            $table->text('file');

            //foreign key
            $table->foreign('id_jenis_surat')
                    ->on('jenis_surat')
                    ->references('id_jenis_surat')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_user')
                    ->on('tbl_user')
                    ->references('id_user')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
