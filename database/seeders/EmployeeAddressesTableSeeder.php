<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployeeAddress;

class EmployeeAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_addresses = [
            [
                'employee_id' => '1',
                'postal_code' => '1234567',
                'prefecture' => '東京都',
                'city' => '渋谷区',
                'street_number' => '1-1-1',
                'building_name' => '渋谷ビル',
            ]
        ];

        foreach ($employee_addresses as $employee_address) {
            EmployeeAddress::create($employee_address);
        }
    }
}
