<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function (){
    return view('about');
});

Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'projects' => Project::all()
    ]);
});

Route::resource('/projects', ProjectController::class);
Route::get('/projects/{project}/tasks', [TaskController::class, 'projectTasks']);

Route::resource('/tasks', TaskController::class);
Route::get('tasks/create/{task}', [TaskController::class,'create']);

Route::resource('/users', UserController::class);

