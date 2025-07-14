<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::firstOrCreate(
            [
                'name' => 'Mbay Fc',
                'phone' => '081246066741',
                'logo' => '',
            ]
            );
    }
}
