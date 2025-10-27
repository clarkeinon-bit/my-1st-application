<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // --- READ: INDEX (GET /jobs) ---
    public function index()
    {
        // Logic cut from: Route::get('/jobs')
        return view('jobs.index', [
            'jobs' => Job::with('employer','tags')->latest()->paginate(10)
        ]);
    }

    // --- CREATE: CREATE (GET /jobs/create) ---
    public function create()
    {
        // Logic cut from: Route::get('/jobs/create')
        return view('jobs.create');
    }

    // --- READ: SHOW (GET /jobs/{job}) ---
    public function show(Job $job)
    {
        // Logic cut from: Route::get('/jobs/{job}')
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    // --- CREATE: STORE (POST /jobs) ---
    public function store()
    {
        // Logic cut from: Route::post('/jobs')

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 // Hard-coded for now
        ]);

        return redirect('/jobs');
    }

    // --- UPDATE: EDIT (GET /jobs/{job}/edit) ---
    public function edit(Job $job)
    {
        // Logic cut from: Route::get('/jobs/{job}/edit')
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    // --- UPDATE: UPDATE (PATCH /jobs/{job}) ---
    public function update(Job $job)
    {
        // Logic cut from: Route::patch('/jobs/{job}')
        
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update([ 
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    // --- DELETE: DESTROY (DELETE /jobs/{job}) ---
    public function destroy(Job $job)
    {
        // Logic cut from: Route::delete('/jobs/{job}')
        $job->delete();
        return redirect('/jobs');
    }
}