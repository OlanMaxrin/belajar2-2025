<?php

namespace Database\Seeders;

use App\Models\Club;       // <-- Pastikan ini di-import
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tentukan nama klub yang akan bertanding
        $namaHomeClub = 'Mbay FC';
        $namaAwayClub = 'FC Barcelona';

        // 2. Cari ID klub di database berdasarkan nama
        $homeClub = Club::where('name', $namaHomeClub)->first();
        $awayClub = Club::where('name', $namaAwayClub)->first();

        // 3. Jika kedua klub ditemukan, buat jadwalnya
        if ($homeClub && $awayClub) {
            Schedule::firstOrCreate(
                [
                    // Kondisi untuk mencari (agar tidak duplikat)
                    'home_club_id' => $homeClub->id,
                    'away_club_id' => $awayClub->id,
                    'match_date'   => '2025-07-20',
                ],
                [
                    // Data yang akan dibuat jika tidak ditemukan
                    'competition'   => 'Mbay Cup 1',
                    'kick_off'      => '15:00',
                    'stadium'       => 'GBK',
                    'match_round'   => 'Babak Penyisihan',
                ]
            );
        } else {
            // Beri pesan error jika salah satu klub tidak ada di database
            $this->command->error("Klub '{$namaHomeClub}' atau '{$namaAwayClub}' tidak ditemukan.");
        }
    }
}