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
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            // 🔗 Tambahan: Hubungkan pembayaran ini ke sebuah tim. Ini sangat penting.
            $table->foreignId('club_id')->constrained('clubs');

            // 💰 Gunakan tipe data angka (integer/bigInteger) untuk uang, bukan string.
            // Simpan dalam satuan terkecil (misal: 500.000 disimpan sebagai 500000).
            $table->unsignedBigInteger('registration_fee');
            $table->unsignedBigInteger('deposit_amount');
            $table->unsignedBigInteger('card_fine')->default(0); // Denda kartu, default 0

            $table->string('payment_method');

            // ✅ Perbaiki kolom enum dengan memberikan pilihan dan nilai default.
            $table->enum('status', ['pending', 'paid', 'partially_paid', 'refunded'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
