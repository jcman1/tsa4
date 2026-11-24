
<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::view('/', 'welcome')->name('welcome');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::view('/about', 'about')->name('about');
Route::view('/profile', 'profile')->name('profile');

// Protected task management
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->name('dashboard');

    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

require __DIR__.'/auth.php';
