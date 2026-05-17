<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tenants')->insert([
            ['full_name' => 'Nguyễn Văn A', 'phone' => '0901234567', 'identity_card' => '012345678901', 'address' => 'Hà Nội', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Trần Thị B', 'phone' => '0912345678', 'identity_card' => '012345678902', 'address' => 'Đà Nẵng', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Lê Văn C', 'phone' => '0923456789', 'identity_card' => '012345678903', 'address' => 'TP.HCM', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Phạm Minh D', 'phone' => '0934567890', 'identity_card' => '012345678904', 'address' => 'Cần Thơ', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Hoàng Thị E', 'phone' => '0945678901', 'identity_card' => '012345678905', 'address' => 'Hải Phòng', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
