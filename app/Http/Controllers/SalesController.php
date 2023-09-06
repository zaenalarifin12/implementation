<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{

    public function index()
    {
        Log::info('Sales index method called.');

        $sales = Sale::all();

        Log::info('Retrieved all sales records.');

        return response()->json($sales);
    }

    public function store(Request $request)
    {
        Log::info('Sales store method called.');

        $data = $request->validate([
            'employee_id' => 'required|integer',
            'sales' => 'required|numeric',
        ]);

        $sale = Sale::create($data);

        Log::info('Sale created successfully.');

        return response()->json($sale, 201);
    }

    public function show($id)
    {
        Log::info('Sales show method called with ID: ' . $id);

        $sale = Sale::find($id);

        if (!$sale) {
            Log::info('Sale not found with ID: ' . $id);
            return response()->json(['message' => 'Sale not found'], 404);
        }

        Log::info('Sale retrieved successfully.');

        return response()->json($sale);
    }

    public function update(Request $request, $id)
    {
        Log::info('Sales update method called with ID: ' . $id);

        $sale = Sale::find($id);

        if (!$sale) {
            Log::info('Sale not found with ID: ' . $id);

            return response()->json(['message' => 'Sale not found'], 404);
        }

        $data = $request->validate([
            'sales' => 'required|numeric',
        ]);

        $sale->update($data);
        
        Log::info('Sale updated successfully.');

        return response()->json($sale);
    }

    public function destroy($id)
    {
        Log::info('Sales destroy method called with ID: ' . $id);

        $sale = Sale::find($id);

        if (!$sale) {
            Log::info('Sale not found with ID: ' . $id);
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $sale->delete();
        
        Log::info('Sale deleted successfully.');

        return response()->json(['message' => 'Sale deleted']);
    }
}
