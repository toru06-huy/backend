<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('utilities')->insert([
            ['room_id' => 1, 'month' => 5, 'electric_old' => 1200, 'electric_new' => 1350, 'water_old' => 45, 'water_new' => 52, 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 6, 'month' => 5, 'electric_old' => 850, 'electric_new' => 920, 'water_old' => 30, 'water_new' => 34, 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 7, 'month' => 5, 'electric_old' => 2100, 'electric_new' => 2310, 'water_old' => 80, 'water_new' => 91, 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 8, 'month' => 5, 'electric_old' => 1450, 'electric_new' => 1600, 'water_old' => 55, 'water_new' => 62, 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 9, 'month' => 5, 'electric_old' => 600, 'electric_new' => 680, 'water_old' => 20, 'water_new' => 25, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
