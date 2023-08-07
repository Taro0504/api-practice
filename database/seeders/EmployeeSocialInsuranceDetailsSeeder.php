<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployeeSocialInsuranceDetail;

class EmployeeSocialInsuranceDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_social_insurance_details = [
            [
                'employee_id' => '1',
                'health_insurance_number' => '1234567890',
                'pension_number' => '12345678',
                'my_number' => '123456789012',
            ]
        ];

        foreach ($employee_social_insurance_details as $employee_social_insurance_detail) {
            EmployeeSocialInsuranceDetail::create($employee_social_insurance_detail);
        }
    }
}
