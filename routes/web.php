<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Users
    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users/create', [UserController::class,'store'])->name('users.store');
    Route::get('/users/edit/{user}', [UserController::class,'edit'])->name('users.edit');
    Route::put('/users/edit/{user}', [UserController::class,'update'])->name('users.update');
    Route::get('/users/show/{user}', [UserController::class,'show'])->name('users.show');
    Route::delete('/users/destroy/{user}', [UserController::class,'destroy'])->name('user.destroy');

    //Categories
    Route::get('/category', [CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('/category/edit/{category}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/category/show/{category}', [CategoryController::class,'show'])->name('category.show');
    Route::delete('/category/destroy/{category}', [CategoryController::class,'destroy'])->name('category.destroy');

    //Income
    Route::get('/income', [IncomeController::class,'index'])->name('income.index');
    Route::get('/income/create', [IncomeController::class,'create'])->name('income.create');
    Route::post('/income/create', [IncomeController::class,'store'])->name('income.store');
    Route::get('/income/edit/{income}', [IncomeController::class,'edit'])->name('income.edit');
    Route::put('/income/edit/{income}', [IncomeController::class,'update'])->name('income.update');
    Route::get('/income/show/{income}', [IncomeController::class,'show'])->name('income.show');
    Route::delete('/income/destroy/{income}', [IncomeController::class,'destroy'])->name('income.destroy');

    //Expense
    Route::get('/expense', [ExpenseController::class,'index'])->name('expense.index');
    Route::get('/expense/create', [ExpenseController::class,'create'])->name('expense.create');
    Route::post('/expense/create', [ExpenseController::class,'store'])->name('expense.store');
    Route::get('/expense/edit/{expense}', [ExpenseController::class,'edit'])->name('expense.edit');
    Route::put('/expense/edit/{expense}', [ExpenseController::class,'update'])->name('expense.update');
    Route::get('/expense/show/{expense}', [ExpenseController::class,'show'])->name('expense.show');
    Route::delete('/expense/destroy/{expense}', [ExpenseController::class,'destroy'])->name('expense.destroy');

    Route::get('/summary', [SummaryController::class,'summary'])->name('summary.index');
    
});

require __DIR__.'/auth.php';
