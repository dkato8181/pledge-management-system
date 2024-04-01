<?php

namespace App\Http\Controllers;

use App\Http\Resources\BudgetResource;
use App\Models\Budget;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index(): JsonResponse
    {
        $budgets = BudgetResource::collection(Budget::all());

        return response()->json($budgets);
    }

    public function store(Request $request)
    {
        $budget = new Budget();
        $budget->title = $request->title;
        $budget->save();

        return response()->json([
            'message' => 'budget created sucessfully'
        ], 200);
    }

    public function show(string $id)
    {
        $budget = new BudgetResource(Budget::findOrFail($id));

        return response()->json($budget);
    }

    public function update(Request $request, string $id)
    {
        $budget = Budget::find($id);
        $budget->title = $request->title;
        $budget->save();

        return response()->json([
            'message' => 'budget updated sucessfully'
        ], 200);
    }

    public function destroy(string $id)
    {
        Budget::destroy($id);

        return response()->json([
            'message' => 'budget deleted sucessfully'
        ], 200);
    }
}
