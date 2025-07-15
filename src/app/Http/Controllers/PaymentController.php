<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
     public function store(Request $request)
    {
        // Misalkan biaya pendaftaran didapat dari input form atau dari data turnamen
        $biaya_pendaftaran = 1000000; // Contoh: Rp 1.000.000

        // 💻 Di sinilah Anda menghitung depositnya
        $deposit = $biaya_pendaftaran / 2; // Hasilnya: 500000

        // Simpan ke database menggunakan data yang sudah dihitung
        $payment = Payment::create([
            'team_id'          => $request->input('team_id'), // Ambil ID tim dari form
            'registration_fee' => $biaya_pendaftaran,
            'deposit_amount'   => $deposit,
            'payment_method'   => $request->input('payment_method'),
            'status'           => 'partially_paid', // Statusnya jadi sudah bayar sebagian
        ]);

        // Redirect atau berikan response
        return redirect()->route('payments.show', $payment)->with('success', 'Pembayaran deposit berhasil disimpan!');
    }
}
