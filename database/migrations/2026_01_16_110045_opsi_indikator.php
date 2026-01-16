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
        Schema::create('opsi_indikator', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('indikator_id');

    $table->string('label');     // teks opsi (contoh: "Sangat Baik")
    $table->string('value');     // nilai (contoh: A, 5, ya)
    $table->integer('skor')->nullable(); // bobot nilai (opsional)

    $table->timestamps();

    $table->foreign('indikator_id')
        ->references('id')
        ->on('indikator')
        ->onDelete('cascade');
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
