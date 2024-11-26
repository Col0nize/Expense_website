<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Category;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::where('user_id','=',auth()->user()->id)->orderBy('date_time','desc')->get();
        return view('expense.index',compact('expenses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('expense.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create([
            'amount' => $request->input('amount'),
            'date_time' => $request->input('date_time'),
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category_id')
        ]);

        // $expense = new Expense();

        // $expense->amount = $request->input('amount');
        // $expense->date_time = $request->input('date_time');
        // $expense->user_id = auth()->user()->id;
        // $expense->category_id = $request->input('category_id');

        if ($expense){ //if success
            return redirect()->route('expense.index')->with('success','Expense successfully added');
        }

        return redirect()->route('expense.index')->with('error','Failed to add expense');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $categories = Category::orderBy('name')->get();
        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $categories = Category::orderBy('name')->get();
        return view('expense.edit', compact('expense','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->amount = $request->input('amount');
        $expense->date_time = $request->input('date_time');

        if ($expense->save()){
            return redirect()->route('expense.index')->with('success','Expense successfully updated');
        }
        return redirect()->route('expense.index')->with('error','Failed to update expense');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        if ($expense->delete()){ //forceDelete() utk permanently delete
            return redirect()->route('expense.index')->with('success','Expense successfully deleted');
        }
        return redirect()->route('expense.index')->with('error','Failed to delete expense');
    }
}
