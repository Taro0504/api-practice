<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployeeFamily;

class EmployeeFamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_families = [
            [
                'employee_id' => '1',
                'relationship' => '妻',
                'family_member_name' => '山田花子',
                'birth_date' => '1980-01-01',
                'is_dependent' => '1',
            ]
        ];

        foreach ($employee_families as $employee_family) {
            EmployeeFamily::create($employee_family);
        }
    }
}
