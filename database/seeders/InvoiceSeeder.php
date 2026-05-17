<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('invoices')->insert([
            ['contract_id' => 1, 'utility_id' => 1, 'room_price' => 2500000.00, 'electric_total' => 150, 'water_total' => 7, 'total_amount' => 3050000.00, 'status' => 'paid', 'created_at' => now(), 'updated_at' => now()],
            ['contract_id' => 2, 'utility_id' => 3, 'room_price' => 3000000.00, 'electric_total' => 210, 'water_total' => 11, 'total_amount' => 3800000.00, 'status' => 'unpaid', 'created_at' => now(), 'updated_at' => now()],
            ['contract_id' => 3, 'utility_id' => 4, 'room_price' => 3000000.00, 'electric_total' => 150, 'water_total' => 7, 'total_amount' => 3550000.00, 'status' => 'paid', 'created_at' => now(), 'updated_at' => now()],
            ['contract_id' => 4, 'utility_id' => 2, 'room_price' => 2500000.00, 'electric_total' => 70, 'water_total' => 4, 'total_amount' => 2750000.00, 'status' => 'paid', 'created_at' => now(), 'updated_at' => now()],
            ['contract_id' => 5, 'utility_id' => 5, 'room_price' => 3500000.00, 'electric_total' => 80, 'water_total' => 5, 'total_amount' => 3800000.00, 'status' => 'unpaid', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
