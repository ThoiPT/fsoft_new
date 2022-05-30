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
        $recruit_list = Recruit::where('status', '=', 1)->where('department_id',2);
        // Nếu chọn đủ cả 3 trường
        if (isset($request->start_date) && isset($request->end_date) && isset($request->department_name)) {
            $from = date($request->start_date);
            $to = date('Y-m-d H:i:s', strtotime(date($request->end_date) . ' +1 day'));
            $depart = $request->department_name;
            $recruit_list = $recruit_list->whereBetween('created_at', [$from, $to])->where('department_id',$depart);
        }
        // Nếu chỉ chọn ngày bắt đầu -> show dữ liệu từ ngày bắt đầu đến hiện tại
        if(isset($request->start_date) && !isset($request->end_date) && !isset($request->department_name)){
            $from = date($request->start_date);
            $recruit_list = $recruit_list->where('created_at', '>',$from);
        }
        // Nếu chỉ chọn ngày kết thúc
        if(isset($request->end_date) && !isset($request->start_date) && !isset($request->department_name)){
            $to = date('Y-m-d H:i:s', strtotime(date($request->end_date) . ' +1 day'));
            $recruit_list = $recruit_list->where('created_at', '<',$to);
        }
        // Nếu chỉ chọn department
        if(isset($request->department_name) && !isset($request->start_date) && !isset($request->end_date)){
            $depart = $request->department_name;
            $recruit_list = $recruit_list->where('department_id', '=',$depart);
        }
        // Nếu chỉ chọn ngày bắt đầu, ngày kết thúc mà không chọn department
        if(isset($request->start_date) && isset($request->end_date) && !isset($request->department_name) ){
            $from = date($request->start_date);
            $to = date('Y-m-d H:i:s', strtotime(date($request->end_date) . ' +1 day'));
            $recruit_list = $recruit_list->whereBetween('created_at', [$from, $to]);
        }

        $recruit_list = $recruit_list->paginate(50);
        $vacancy_list = Vacancy::all();
        $account_list = User::all();
        $cvOnboard = CV::where('status', '=', Status::Onboard)->get();
        $department_list = Department::all();

        $cv_list = CV::all();
        $recruit_chart_open = Recruit::where('status',1)->count();

        return view('dashboard',
            compact(
                'recruit_list',
                'vacancy_list',
                'account_list',
                'cvOnboard',
                'department_list',
                'cv_list',
                'recruit_chart_open'
            ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
