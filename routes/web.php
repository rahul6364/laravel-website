<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';
