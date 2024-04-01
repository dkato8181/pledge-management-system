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
}
