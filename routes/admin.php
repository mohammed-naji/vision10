<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('dashboard', function(){ return 'Admin Dashboard'; } )->name('dashboard');
    Route::get('users', function(){ return 'Admin users'; } )->name('users');
    Route::get('products', function(){ return 'Admin products'; } )->name('products');
    Route::get('orders', function(){ return 'Admin orders'; } )->name('orders');
    Route::get('payments', function(){ return 'Admin payments'; } )->name('payments');
});
