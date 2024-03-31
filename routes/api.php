<?php

use App\Http\Controllers\BudgetController;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('budgets', BudgetController::class);
