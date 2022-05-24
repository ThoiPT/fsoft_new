<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\RecruitSkillController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('recruits', RecruitController::class);
Route::resource('skills', SkillController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('cv', CvController::class);
Route::resource('users', UserController::class);
Route::resource('vacancies', VacancyController::class);
Route::resource('recruit_skills', RecruitSkillController::class);

//Other Controller



// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/logout',[HomeController::class,'logout']);

Auth::routes();
