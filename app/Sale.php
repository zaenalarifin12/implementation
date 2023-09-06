<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales_data';
    protected $primaryKey = 'sales_id';
    protected $fillable = ['employee_id', 'sales'];

    // Define relationships, if any
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
