<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::firstOrCreate (
            [
                'club_id' => 1,
                'registration_fee' => '500000',
                'deposit_amount' => '250000',
                'card_fine' => '50000',
                'payment_method' => 'Transfer Bank',
                'status' => 'partially_paid',
            ]
            );
    }
}
