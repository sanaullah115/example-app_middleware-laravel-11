<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthentication;
use Illuminate\Support\Facades\Route;



//CRUD ROutes start
Route::get('/index',[CRUDController::class,'index'])->name('index');

Route::get('/Form',[CRUDController::class,'Form']);
Route::post('/create',[CRUDController::class,'create'])->name('create');

Route::get('/edit/{id}',[CRUDController::class,'edit'])->name('edit');


Route::post('/update/{id}',[CRUDController::class,'update'])->name('update');


Route::get('/delete/{id}',[CRUDController::class,'delete'])->name('delete');


//CRUD ROutes End










Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('/');
});
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/Register', [UserController::class, 'Registersave'])->name('registersave');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginuser'])->name('loginuser');
Route::get('/dashboard', [UserController::class, 'dashboardpage'])->name('dashboard');




// Route::get('/allowpage', [UserController::class, 'allowpage'])->name('allowpage');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');






Route::middleware(['isAdmin'])->group(function () {
    Route::get('/Admin/dashbaord', [AdminController::class, 'dashboard'])->name('dashboard');

    });

// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/Admin/dashbaord', [AdminController::class, 'dashboard'])->name('dashboard');
// });





Route::middleware(['auth','isUser'])->group(function () {
    Route::get('/dashbaord', [UserController::class, 'dashboardpage'])->name('userdashboard');
});
