<?php

namespace Tests\Feature;

use App\Employee;
use App\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SalesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateSale()
    {

        $employee = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Sales Representative',
            'salary' => 60000,
            'department' => 'Sales',
            'joined_date' => '2023-01-15',
        ]);

        // Create a Sales record associated with the Employee
        $salesData = [
            'employee_id' => $employee->employee_id,
            'sales' => 1000.50,
        ];

        $response = $this->json('POST', '/api/sales', $salesData);

        $response->assertStatus(201); // Created
        $this->assertDatabaseHas('sales_data', $salesData);
        $this->assertDatabaseHas('sales_data', $salesData); // Ensure the data is in the database
    }

    public function testReadSale()
    {
        $employee = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Sales Representative',
            'salary' => 60000,
            'department' => 'Sales',
            'joined_date' => '2023-01-15',
        ]);

        // Create a Sales record
        $sale = Sale::create([
            'employee_id' => $employee->employee_id, // Existing employee ID
            'sales' => 1500.75,
        ]);

        $response = $this->json('GET', "/api/sales/{$sale->sales_id}");

        $response->assertStatus(200);
        $response->assertJson($sale->toArray()); // Ensure the response matches the created sale
    }

    public function testUpdateSale()
    {
        $employee = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Sales Representative',
            'salary' => 60000,
            'department' => 'Sales',
            'joined_date' => '2023-01-15',
        ]);

        // Create a Sales record
        $sale = Sale::create([
            'employee_id' => $employee->employee_id, // Existing employee ID
            'sales' => 1500.75,
        ]);


        // Updated data
        $updatedData = [
            'employee_id' => $employee->employee_id, // Existing employee ID
            'sales' => 2000.25,
        ];

        $response = $this->json('PUT', "/api/sales/{$sale->sales_id}", $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('sales_data', $updatedData); // Ensure the data is updated in the database
    }

    public function testDeleteSale()
    {
        // Create a Sales record

        $employee = Employee::create([
            'name' => 'John Doe',
            'job_title' => 'Sales Representative',
            'salary' => 60000,
            'department' => 'Sales',
            'joined_date' => '2023-01-15',
        ]);

        $sale = Sale::create([
            'employee_id' => $employee->employee_id, // Existing employee ID
            'sales' => 1500.75,
        ]);

        $response = $this->json('DELETE', "/api/sales/{$sale->sales_id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('sales_data', ['sales_id' => $sale->isales_idd]); // Ensure the data is deleted from the database
    }
}
