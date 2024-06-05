<?php

use App\Http\Controllers\AssistController;
use App\Http\Controllers\LoggingController;
use App\Http\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\Assist;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log')->middleware('log');

Route::get('/logging', [LoggingController::class, 'index'])->name('logging')->middleware('admin');

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
    Route::post('assist/show',[AssistController::class, 'show'])->name('assists.show');
    Route::get('assist/condition',[AssistController::class, 'condition'])->name('assists.condition');
    Route::get('parameters',[ParameterController::class, 'createParameters'])->name('parameters');
    Route::post('parameters/store',[ParameterController::class, 'storeParameters'])->name('parameters.store');
    Route::get('conditions/export', [AssistController::class, 'export'])->name('conditions.export');

    Route::post('/filter-by-year', [AssistController::class, 'filterByYear']);
    // Route::get('conditions/export-pdf', [AssistController::class, 'exportPdf'])->name('conditions.export-pdf');
});


require __DIR__.'/auth.php';