<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\RecruitSkillController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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
// Chạy symbol link storage bằng cách gọi trực tiếp bằng facade
Route::get('/linkstorage',function (){
   Artisan::call('storage:link');
});

Route::get('/', function () {
    return redirect()->route('dashboard');
//    return view ("auth/login");
});

Route::get('/ple', function(){
    $list = \App\Models\Department::find(1)->count_vacancy();
    return $list;
});


Route::resource('recruits', RecruitController::class)->middleware(['auth']);
Route::resource('skills', SkillController::class)->middleware(['auth']);
Route::resource('departments', DepartmentController::class)->middleware(['auth']);
Route::resource('cv', CvController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('vacancies', VacancyController::class)->middleware(['auth']);
Route::resource('recruit_skills', RecruitSkillController::class)->middleware(['auth']);

//Other Controller
Route::get('/report',[ReportController::class,'index'])->middleware(['auth'])->name('report');
Route::get('/report-export',[ReportController::class,'export'])->middleware(['auth'])->name('export');
Route::get('/report/total_recruit/{id}/{name}',[ReportController::class,'total_recruit'])->middleware(['auth']);
Route::get('/report/total_cv/{id_department}',[ReportController::class,'total_cv'])->middleware(['auth']);
Route::get('/report/total_cv_type/{id}/{status}',[ReportController::class,'total_index'])->middleware(['auth']);


// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/logout',[HomeController::class,'logout']);



Auth::routes();
