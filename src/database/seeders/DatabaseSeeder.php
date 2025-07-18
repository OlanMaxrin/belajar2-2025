<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Schedule;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ClubSeeder::class,
            ScheduleSeeder::class,
            PlayerSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
