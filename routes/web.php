<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VolunteerController;
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

Route::get('/',function(){
return view('home');
}
)->name('home')->middleware('auth_user');

Route::get('/login',[LoginController::class,'LoginForm'])->name('login');
Route::get('/logout',[LoginController::class,'Logout'])->name('logout');

Route::post('/login',[LoginController::class,'authentication'])->name('authentication');
Route::resource('places', PlaceController::class)->middleware('auth_user');
Route::resource('tasks', TaskController::class)->middleware('auth_user');
Route::resource('volunteers', VolunteerController::class)->middleware('auth_user');
Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');

Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
Route::get('/places/{place}/tasks', [AssignmentController::class, 'getTasks']);



