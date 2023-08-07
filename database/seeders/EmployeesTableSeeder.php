<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [ 
                'user_id' => '1',
                'employee_position_id' => '1',
                'first_name' => '太郎',
                'last_name' => '山田',
                'gender' => '男性',
                'birth_date' => '1990-01-01',
                'employment_date' => '2021-01-01',
                'phone_number' => '09012345678',
            ],
            [
                'user_id' => '2',
                'employee_position_id' => '2',
                'first_name' => '花子',
                'last_name' => '山田',
                'gender' => '女性',
                'birth_date' => '1992-01-01',
                'employment_date' => '2022-01-01',
                'phone_number' => '09012349999',
            ]
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
