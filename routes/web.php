<?php

use App\Http\Controllers\AssistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use App\Models\Assist;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log')->middleware('log');

Route::get('/students', function () {
    return view('students.index');
})->middleware(['auth', 'verified'])->name('students.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('students', StudentController::class);
    Route::get('assists/{dni}', [StudentController::class,'assists'])->name('student.assists');
    Route::get('assist/create', [AssistController::class, 'create'])->name('assists.create');
    Route::post('assist/store/{dni}', [AssistController::class, 'store'])->name('assists.store');
    Route::get('assist/search',[AssistController::class, 'search'])->name('assists.search');
    Route::get('assist/show',[AssistController::class, 'show'])->name('assists.show');
});


require __DIR__.'/auth.php';