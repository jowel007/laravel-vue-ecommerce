<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\auth\authController;
use Illuminate\Support\Facades\Auth;

// use App\Models\Role;
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
   return redirect('admin/dashboard');
});

Route::get('/login', function () {
    return view('auth/signIn');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/login_user', [authController::class,'loginUser']);

// Route::get('/createAdmin',[AuthController::class,'createAdmin']);

