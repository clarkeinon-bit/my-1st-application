<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// ----------------------------------------------------
// --- Job Resource Routes (RESTful Ordering) ---
// ----------------------------------------------------

// 1. CREATE Route (Show the form to create a new job)
// NOTE: MUST be defined before the SHOW route below.
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// 2. SHOW Route (Display a specific job)
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', [
        'job' => $job
    ]);
});

// 3. INDEX Route (Display a listing of all jobs)
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer','tags')->latest()->paginate(2)
    ]);
});

// 4. STORE Route (Handle the POST request to save a new job)
Route::post('/jobs', function () {
    // Validation for Title and Salary only
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// 5. EDIT Route (Show the form to edit a job)
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job
    ]);
});

// 6. UPDATE Route (Handle the PATCH request to update a job)
Route::patch('/jobs/{job}', function (Job $job){
    // Validation for Title and Salary only
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    // Update the existing job model
    $job->update([ 
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    // Redirect back to the job's detail page
    return redirect('/jobs/' . $job->id);
});

// 7. DELETE Route (Handle the DELETE request to destroy a job)
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});