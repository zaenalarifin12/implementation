<?php

use Illuminate\Database\Seeder;
use App\Sale;
use App\Employee;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // You can customize this data as needed
        $sales = [
            [
                'sales_id' => 1,
                'employee_id' => 1, 
                'sales' => 15000.00,
            ],
            [
                'sales_id' => 2,
                'employee_id' => 2, 
                'sales' => 12000.00,
            ],
            [
                'sales_id' => 3,
                'employee_id' => 3, 
                'sales' => 18000.00,
            ],
            [
                'sales_id' => 4,
                'employee_id' => 1, 
                'sales' => 20000.00,
            ],
            [
                'sales_id' => 5,
                'employee_id' => 4, 
                'sales' => 22000.00,
            ],
            [
                'sales_id' => 6,
                'employee_id' => 5, 
                'sales' => 19000.00,
            ],
            [
                'sales_id' => 7,
                'employee_id' => 6, 
                'sales' => 13000.00,
            ],
            [
                'sales_id' => 8,
                'employee_id' => 2, 
                'sales' => 14000.00,
            ],
            // Add more sale records as necessary
        ];

        foreach ($sales as $saleData) {
            Sale::create($saleData);
        }
    }
}
