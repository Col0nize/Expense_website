<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::orderBy('name')->get();
       return view('category.index',compact('categories'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->input('name'),

        ]);

        if ($category){ //if success
            return redirect()->route('category.index')->with('success','User successfully added');
        }

        return redirect()->route('category.index')->with('error','Failed to add user');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');

        if ($category->save()){
            return redirect()->route('category.index')->with('success','Category successfully updated');
        }
        return redirect()->route('category.index')->with('error','Failed to update category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->delete()){ //forceDelete() utk permanently delete
            return redirect()->route('category.index')->with('success','Category successfully deleted');
        }
        return redirect()->route('category.index')->with('error','Failed to delete category');
    }
}
