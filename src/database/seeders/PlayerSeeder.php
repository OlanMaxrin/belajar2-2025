<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::firstOrCreate(
            [
                'name' => 'olan',
                'nomor_punggung' => '4',
                'usia' => '17',
            ]
            );
    }
}
