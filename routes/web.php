<?php

use App\Http\Controllers\AdminCreatedUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/projects', [ProjectController::class, 'index'])->middleware('auth')->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware(['auth', 'admin'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->middleware(['auth', 'admin'])->name('projects.store');
Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->middleware(['auth', 'admin'])->name('projects.destroy');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
    ->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])
    ->name('projects.update');

Route::get('/adminspace', [AdminCreatedUserController::class, 'index'])->middleware(['auth', 'admin'])->name('adminspace.index');
Route::get('/adminspace/create', [AdminCreatedUserController::class, 'create'])->middleware(['auth', 'admin'])->name('adminspace.create');
Route::post('/adminspace', [AdminCreatedUserController::class, 'store'])->middleware(['auth', 'admin'])->name('adminspace.store');

Route::get('/projectuser/{project}/create', [ProjectUserController::class, 'create'])->middleware(['auth', 'admin'])->name('projectuser.create');
Route::post('/projectuser/{project}', [ProjectUserController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('projectuser.store');
Route::get('/projectuser/{project}/unassignUsers', [ProjectUserController::class, 'unassignUsers'])
    ->middleware(['auth', 'admin'])
    ->name('projectuser.unassignUsers');
Route::delete('/projectuser/{project}/unassign', [ProjectUserController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('projectuser.unassign');

Route::get('/tasks', [TaskController::class, 'index'])->middleware(['auth', 'admin'])->name('tasks.index');
Route::get('/tasks.create', [TaskController::class, 'create'])->middleware(['auth', 'admin'])->name('tasks.create');
Route::post('tasks.store', [TaskController::class, 'store'])->middleware(['auth', 'admin'])->name('tasks.store');
Route::get('/tasks.mytasks', [TaskController::class, 'myTasks'])->middleware('auth')->name('tasks.mytasks');
