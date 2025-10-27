<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController; // You still need this use statement

// Home Route remains unchanged
Route::get('/', function () {
    return view('home');
});

// --- Job Resource Routes (Resourceful Routing) ---

// This single line registers all 7 standard CRUD routes (index, create, store, show, edit, update, destroy)
// and automatically maps them to the corresponding methods in the JobController.
Route::resource('jobs', JobController::class);