<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index()
    {
        Log::info('Employee index method called.');

        $employees = Employee::all();

        Log::info('Retrieved all employees.');

        return response()->json($employees);
    }

    public function store(Request $request)
    {
        Log::info('Employee store method called.');

        $data = $request->validate([
            'name' => 'required|string',
            'job_title' => 'required|string',
            'salary' => 'required|numeric',
            'department' => 'required|string',
            'joined_date' => 'required|date',
        ]);

        $employee = Employee::create($data);

        Log::info('Employee created successfully.');

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        Log::info('Employee show method called with ID: ' . $id);

        $employee = Employee::find($id);

        if (!$employee) {
            Log::info('Employee not found with ID: ' . $id);
            return response()->json(['message' => 'Employee not found'], 404);
        }

        Log::info('Employee retrieved successfully.');

        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        Log::info('Employee update method called with ID: ' . $id);

        $employee = Employee::find($id);

        if (!$employee) {
            Log::info('Employee not found with ID: ' . $id);
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $data = $request->validate([
            'name' => 'string',
            'job_title' => 'string',
            'salary' => 'numeric',
            'department' => 'string',
            'joined_date' => 'date',
        ]);

        $employee->update($data);

        Log::info('Employee updated successfully.');

        return response()->json($employee);
    }

    public function destroy($id)
    {
        Log::info('Employee destroy method called with ID: ' . $id);

        $employee = Employee::find($id);

        if (!$employee) {
            Log::info('Employee not found with ID: ' . $id);
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();

        Log::info('Employee deleted successfully.');

        return response()->json(['message' => 'Employee deleted']);
    }
}

