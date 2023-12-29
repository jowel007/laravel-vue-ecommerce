<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProfileController;



Route::get('/dashboard', function () {
    return view('admin/index');
});

Route::get('/profile', [ProfileController::class,'index']);
