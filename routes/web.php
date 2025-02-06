<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    return redirect()->route('goods.index');
});

// Goods CRUD
Route::resource('goods', GoodsController::class);

// Borrowers CRUD (using User model as Borrower)
Route::resource('borrowers', BorrowerController::class);

// Loan Management
Route::resource('loans', LoanController::class);
