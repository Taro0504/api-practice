<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployeeBankDetail;

class EmployeeBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_bank_details = [
            [ 
                'employee_id' => '1',
                'bank_name' => '三菱東京UFJ銀行',
                'branch_name' => '本店',
                'branch_number' => '000',
                'account_type' => '普通',
                'account_number' => '1234567',
                'account_holder_name' => '山田太郎'
            ],
        ];

        foreach ($employee_bank_details as $employee_bank_detail) {
            EmployeeBankDetail::create($employee_bank_detail);
        }
    }
}
