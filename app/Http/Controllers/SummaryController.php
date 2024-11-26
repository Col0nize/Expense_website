<?php

namespace App\Http\Controllers;

use App\Http\Requests\SummaryRequest;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function summary(SummaryRequest $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $min = $request->input('min');
        $max = $request->input('max');
        

        $income = Income::where('user_id', '=', auth()->user()->id)
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('date_time', $month);
            })
            ->when($year, function ($query) use ($year) {
                $query->whereYear('date_time', $year);
            })
            ->sum('amount');

        // Expenses
        

        $expenses = Expense::where('user_id', '=', auth()->user()->id)
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('date_time', $month);
            })
            ->when($min, function ($query) use ($min) {
                $query->where('amount', '>=', $min);
            })
            ->when($max, function ($query) use ($max) {
                $query->where('amount', '<=', $max);
            })
            ->when($year, function ($query) use ($year) {
                $query->whereYear('date_time', $year);
            })
            ->orderBy('date_time', 'desc')
            ->get();

            $expensesByCategory = $expenses->groupBy(function ($expense) {
                return $expense->category->name; // Group by the category name
            })->map(function ($categoryExpenses) {
                return $categoryExpenses->sum('amount'); // Sum up the amounts in each category
            });
            

        return view('summary.index', compact('expenses', 'income', 'month', 'expensesByCategory'));
    }
}
