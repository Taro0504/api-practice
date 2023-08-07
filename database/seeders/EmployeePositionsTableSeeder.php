<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployeePosition;

class EmployeePositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_positions = [
            [ 'employee_position' => '正社員'],
            [ 'employee_position' => '事務員'],
            [ 'employee_position' => 'アルバイト'],
        ];

        foreach ($employee_positions as $employee_position) {
            EmployeePosition::create($employee_position);
        }
    }
}
