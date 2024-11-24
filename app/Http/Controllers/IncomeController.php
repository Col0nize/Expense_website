<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::where('user_id','=',auth()->user()->id)->orderBy('date_time','desc')->get();
       return view('income.index',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
    
        $income = Income::create([
            'amount' => $request->input('amount'),
            'date_time' => $request->input('date_time'),
            'user_id' => auth()->user()->id,

        ]);

        if ($income){ //if success
            return redirect()->route('income.index')->with('success','Income successfully added');
        }

        return redirect()->route('income.index')->with('error','Failed to add income');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        return view('income.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        return view('income.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->amount = $request->input('amount');
        $income->date_time = $request->input('date_time');

        if ($income->save()){
            return redirect()->route('income.index')->with('success','User successfully updated');
        }
        return redirect()->route('income.index')->with('error','Failed to update food');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        if ($income->delete()){ //forceDelete() utk permanently delete
            return redirect()->route('income.index')->with('success','Income successfully deleted');
        }
        return redirect()->route('income.index')->with('error','Income to delete category');
    }
}
