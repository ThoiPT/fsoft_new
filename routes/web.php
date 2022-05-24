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
    return view('auth/login');
});

Route::resource('recruits', RecruitController::class)->middleware(['auth']);
Route::resource('skills', SkillController::class)->middleware(['auth']);
Route::resource('departments', DepartmentController::class)->middleware(['auth']);
Route::resource('cv', CvController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('vacancies', VacancyController::class)->middleware(['auth']);
Route::resource('recruit_skills', RecruitSkillController::class)->middleware(['auth']);

//Other Controller


// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/logout',[HomeController::class,'logout']);

Auth::routes();
