<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Nguyễn Văn An',
                'phone' => '0901234561',
            ],
            [
                'id' => 2,
                'name' => 'Trần Thị Bích',
                'phone' => '0912345672',
            ],
            [
                'id' => 3,
                'name' => 'Lê Văn Cường',
                'phone' => '0923456783',
            ],
            [
                'id' => 4,
                'name' => 'Phạm Thị Dung',
                'phone' => '0934567894',
            ],
            [
                'id' => 5,
                'name' => 'Hoàng Văn Em',
                'phone' => '0945678905',
            ]
        ]);
    }
}