<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CV;
use App\Models\Department;
use App\Models\Recruit;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
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
//        dd($request);


        $recruit_list = Recruit::where('status', '=', 1);
        if (isset($request->start_date) && isset($request->end_date)) {
            $from = date($request->start_date);
            $to = date('Y-m-d H:i:s', strtotime(date($request->end_date) . ' +1 day'));
            $recruit_list = $recruit_list->whereBetween('created_at', [$from, $to]);
        }
        if(isset($request->start_date) && !isset($request->end_date)){
            $from = date($request->start_date);
            $recruit_list = $recruit_list->where('created_at', '>',$from);
        }
        if(!isset($request->start_date) && isset($request->end_date)){
            $to = date($request->end_date);;
            $recruit_list = $recruit_list->where('created_at', '<',$to);
        }
        $recruit_list = $recruit_list->paginate(50);
        $vacancy_list = Vacancy::all();
        $account_list = User::all();
        $cvOnboard = CV::where('status', '=', Status::Onboard)->get();
        $department_list = Department::all();
        return view('dashboard', compact('recruit_list', 'vacancy_list', 'account_list', 'cvOnboard','department_list'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
