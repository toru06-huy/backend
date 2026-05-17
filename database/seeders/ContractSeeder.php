<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contracts')->insert([
            ['room_id' => 1, 'tenant_id' => 1, 'start_date' => '2026-01-01', 'end_date' => '2026-12-31', 'deposit_amount' => 5000000.00, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 6, 'tenant_id' => 2, 'start_date' => '2026-02-15', 'end_date' => '2027-02-15', 'deposit_amount' => 6000000.00, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 7, 'tenant_id' => 3, 'start_date' => '2025-06-01', 'end_date' => '2026-06-01', 'deposit_amount' => 6000000.00, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 8, 'tenant_id' => 4, 'start_date' => '2025-01-01', 'end_date' => '2025-12-31', 'deposit_amount' => 5000000.00, 'status' => 'terminated', 'created_at' => now(), 'updated_at' => now()],
            ['room_id' => 9, 'tenant_id' => 5, 'start_date' => '2026-04-01', 'end_date' => '2027-04-01', 'deposit_amount' => 7000000.00, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
