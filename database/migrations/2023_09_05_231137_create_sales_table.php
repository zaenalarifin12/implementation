<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_data', function (Blueprint $table) {
            $table->id('sales_id');
            $table->unsignedBigInteger('employee_id');
            $table->decimal('sales', 10, 2);
            $table->timestamps();

            // Define a foreign key constraint
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_data');
    }
}
