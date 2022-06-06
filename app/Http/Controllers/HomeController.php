<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CV;
use App\Models\Department;
use App\Models\Recruit;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $department_id = $request->department_name;

        $recruit_list = Recruit::where('status', '=', 1);

        $recruit_list = $recruit_list->paginate(50);
        $vacancy_list = Vacancy::all();
        $account_list = User::all();
        $cvOnboard = CV::where('status', '=', Status::Onboard)->get();
        $department_list = Department::all();

        $cv_list = CV::all();
        // Đưa value vao array để truyền qua property của chart
        $recruit_chart_open[] = Recruit::where('status',1)->count();
        $recruit_chart_close[] = Recruit::where('status',0)->count();
        $cv_new[] = CV::where('status',Status::New)->count();
        $cv_interview[] = CV::where('status',Status::Interview)->count();
        $cv_offer[] = CV::where('status',Status::Offer)->count();
        $cv_onboard[] = CV::where('status',Status::Onboard)->count();
//        dd($recruit_chart_open);
        return view('dashboard',
            compact(
                'recruit_list',
                'vacancy_list',
                'account_list',
                'cvOnboard',
                'department_list',
                'cv_list',
                'recruit_chart_open',
                'recruit_chart_close',
                'cv_new',
                'cv_interview',
                'cv_offer',
                'cv_onboard',
            ));

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
