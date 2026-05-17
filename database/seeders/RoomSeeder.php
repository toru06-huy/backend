<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            ['room_number' => 101, 'price' => 2500000.00, 'status' => 'rented', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 102, 'price' => 2500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 103, 'price' => 2500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 104, 'price' => 2500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 105, 'price' => 2500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 201, 'price' => 3000000.00, 'status' => 'rented', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 202, 'price' => 3000000.00, 'status' => 'rented', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 203, 'price' => 3000000.00, 'status' => 'rented', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 204, 'price' => 3000000.00, 'status' => 'rented', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 205, 'price' => 3000000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 301, 'price' => 3500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 302, 'price' => 3500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 303, 'price' => 3500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 304, 'price' => 3500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['room_number' => 305, 'price' => 3500000.00, 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
