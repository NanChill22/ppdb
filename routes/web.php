<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\StudentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Rute Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Rute Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute Multi User
Route::middleware(['auth'])->group(function () {
        // Rute Admin
    Route::middleware('role:admin')->group(function () {
        // menu tambah data
        // menu edit data 
        // menu hapus data
        // menu edit presensi
    });

    // Rute Operator
    Route::middleware('role:operator')->group(function () {
        Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    });

    // Rute Student
    Route::middleware('role:student')->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    });
    // Rute Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rute Autentikasi
require __DIR__.'/auth.php';
