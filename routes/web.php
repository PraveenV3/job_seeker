<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('Home');
})->name('home')->middleware('auth');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Profile routes

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Job routes (using resourceful controller)
    Route::resource('jobs', JobController::class)->except(['create', 'show', 'destroy']);
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');


    Route::get('/newshow', [JobApplicationController::class, 'newshow'])->name('jobApplications.newshow');

    // Job application routes
    Route::get('/seeker', [JobApplicationController::class, 'seeker'])->name('seeker');
    Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply');
    Route::delete('/applications/{jobApplication}', [JobApplicationController::class, 'destroy'])->name('jobApplications.destroy');
    Route::get('/applications/{jobApplication}/show', [JobApplicationController::class, 'show'])->name('jobApplications.show');
    Route::get('/applications/{jobApplication}/apply', [JobApplicationController::class, 'apply'])->name('apply');
    Route::post('/job-applications', [JobApplicationController::class, 'store'])->name('jobApplications.store');


    Route::get('/applications/{jobApplication}', [JobApplicationController::class, 'jobCandidates'])->name('jobApplications.jobCandidates');



    Route::get('/candidates', [JobApplicationController::class, 'candidates'])->name('candidates');



    // Route::get('/applications/edit', [JobApplicationController::class, 'edit'])->name('edit');

    Route::get('/myApplications', [JobApplicationController::class, 'myApplications'])->name('myApplications');

    Route::get('/applications', [JobApplicationController::class, 'index'])->name('applications.index');
    Route::get('/chart', [ChartController::class, 'index']);

    // Dashboard route
    Route::get('/all', [JobController::class, 'all'])->name('all');
    Route::get('/dashboard', [JobController::class, 'dashboard'])->name('dashboard');

});

// Authentication routes
require __DIR__.'/auth.php';
