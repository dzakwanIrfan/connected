<?php

use App\Models\User;
use App\Models\Project;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TaskController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\SuggestionController;

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
    return view('login.index');
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

// Route::get('/register', [RegisterController::class,'index']);
// Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'projects' => Project::all()
    ]);
})->middleware('owner');

Route::resource('/projects', ProjectController::class)->middleware('owner');
Route::get('/projects/{project}/tasks', [TaskController::class, 'projectTasks'])->middleware('auth');

Route::resource('/tasks', TaskController::class)->middleware('auth');
Route::get('tasks/create/{task}', [TaskController::class,'create'])->middleware('auth');

Route::resource('/users', UserController::class)->middleware('auth');

Route::get('/workbench', function (){
    return view('workbench.index', [
        'projects' => Project::all(),
        'user' => User::where('id', auth()->id())->first()
    ]);
})->middleware('auth');

Route::resource('/user-task', UserTaskController::class)->middleware('owner');
Route::get('/user-task/create/{task}', [UserTaskController::class,'create'])->middleware('auth');
Route::get('/user-task/file/{task}', [UserTaskController::class,'file'])->middleware('auth');

Route::resource('/suggestions', SuggestionController::class)->middleware('auth');

Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::post('/file', [FileController::class,'store'])->middleware('auth');