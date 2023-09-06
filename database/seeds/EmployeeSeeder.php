<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            [
                "employee_id" => 1,
                'name' => 'John Smith',
                'job_title' => 'Manager',
                'salary' => 60000.00,
                'department' => 'Sales',
                'joined_date' => '2022-01-15',
            ],
            [
                "employee_id" => 2,
                'name' => 'John Doe',
                'job_title' => 'Analyst',
                'salary' => 45000.00,
                'department' => 'Marketing',
                'joined_date' => '2022-02-01',
            ],
            [
                "employee_id" => 3,
                'name' => 'Mike Brown',
                'job_title' => 'Developer',
                'salary' => 55000.00,
                'department' => 'IT',
                'joined_date' => '2022-03-10',
            ],
            [
                "employee_id" => 4,
                'name' => 'Anna Lee',
                'job_title' => 'Manager',
                'salary' => 65000.00,
                'department' => 'Sales',
                'joined_date' => '2022-12-05',
            ],
            [
                "employee_id" => 5,
                'name' => 'Mark Wong',
                'job_title' => 'Developer',
                'salary' => 50000.00,
                'department' => 'IT',
                'joined_date' => '2022-05-20',
            ],
            [
                "employee_id" => 6,
                'name' => 'Emily Chen',
                'job_title' => 'Analyst',
                'salary' => 48000.00,
                'department' => 'Marketing',
                'joined_date' => '2022-06-02',
            ],
        ];

        foreach ($employees as $employeeData) {
            Employee::create($employeeData);
        }
    }

}
