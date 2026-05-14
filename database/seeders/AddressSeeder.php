<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'id_user' => 1,
                'detail_address' => '12 Lê Lợi',
                'city' => 'Hồ Chí Minh',
                'district' => 'Quận 1',
            ],
            [
                'id_user' => 1,
                'detail_address' => '34 Nguyễn Huệ',
                'city' => 'Hồ Chí Minh',
                'district' => 'Quận 3',
            ],
            [
                'id_user' => 2,
                'detail_address' => '78 Trần Hưng Đạo',
                'city' => 'Hà Nội',
                'district' => 'Hoàn Kiếm',
            ],
            [
                'id_user' => 3,
                'detail_address' => '11 Trần Phú',
                'city' => 'Đà Nẵng',
                'district' => 'Hải Châu',
            ],
            [
                'id_user' => 4,
                'detail_address' => '44 Hùng Vương',
                'city' => 'Cần Thơ',
                'district' => 'Ninh Kiều',
            ]
        ]);
    }
}
