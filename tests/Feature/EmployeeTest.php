<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Employee;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateEmployee()
    {
        $data = [
            'name' => 'John Doe',
            'job_title' => 'Software Engineer',
            'salary' => 60000,
            'department' => 'Engineering',
            'joined_date' => '2023-01-15',
        ];

        $response = $this->json('POST', '/api/employees', $data);

        $response->assertStatus(201); // Created
        $this->assertDatabaseHas('employees', $data); // Ensure the data is in the database
    }

    public function testGetAllEmployees()
    {
        $employee1 = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Software Engineer',
            'salary' => 60000,
            'department' => 'Engineering',
            'joined_date' => '2023-01-15',
        ]);

        $employee2 = Employee::create([
            'name' => 'Jane Smith',
            'job_title' => 'Product Manager',
            'salary' => 75000,
            'department' => 'Product Management',
            'joined_date' => '2022-11-10',
        ]);

        $response = $this->json('GET', '/api/employees');

        $response->assertStatus(200);
        $response->assertJson([$employee1->toArray(), $employee2->toArray()]);
    }

    public function testShowEmployee()
    {
        $employee = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Software Engineer',
            'salary' => 60000,
            'department' => 'Engineering',
            'joined_date' => '2023-01-15',
        ]);

        $response = $this->json('GET', "/api/employees/{$employee->employee_id}");

        $response->assertStatus(200);
        $response->assertJson($employee->toArray());
    }

    public function testUpdateEmployee()
    {
        $employee = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Software Engineer',
            'salary' => 60000,
            'department' => 'Engineering',
            'joined_date' => '2023-01-15',
        ]);

        $updatedData = [
            'name' => 'Updated Name',
            'job_title' => 'Updated Job Title',
        ];

        $response = $this->json('PUT', "/api/employees/{$employee->employee_id}", $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', $updatedData); // Ensure the data is updated in the database
    }

    public function testDeleteEmployee()
{
    $employee = Employee::create([
        'name' => 'John Doe',
        'job_title' => 'Software Engineer',
        'salary' => 60000,
        'department' => 'Engineering',
        'joined_date' => '2023-01-15',
    ]);

    $response = $this->json('DELETE', "/api/employees/{$employee->employee_id}");

    $response->assertStatus(200);
    $this->assertDatabaseMissing('employees', ['employee_id' => $employee->employee_id]); // Ensure the data is deleted from the database
}

}
