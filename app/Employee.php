<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    protected $fillable = ['name', 'job_title', 'salary', 'department', 'joined_date'];
    
    // Define relationships, if any
    public function sales()
    {
        return $this->hasMany(Sale::class, 'employee_id', 'employee_id');
    }
}
