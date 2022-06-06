<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CV;
use App\Models\Department;
use App\Models\Recruit;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
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


////     EMPOYEE:
//       if (Auth::user()->role == UserRole::Employee){
//           $user_department = Auth::user()->department;
//
//           return ;
//       }

       //ADMIN:
        $recruit_list = Recruit::where('status',1)->get();
        $department_list = Department::all();

        if(isset($request->start_date) && isset($request->end_date)){
            $from = date('Y-m-d H:i:s', strtotime($request->start_date));
            $to = date('Y-m-d H:i:s', strtotime(date($request->end_date) . ' +1 day'));
        }else{
            $from = date('Y-m-d H:i:s', strtotime("01-01-0001"));
            $to = date('Y-m-d H:i:s', strtotime( date("d-m-Y H:i:s") . '+10 year'));
        }

        $depart = $request->department_name;
        $list_cv = null;
        //check pick department
        $check_department = false;
        $vacancy_list = Vacancy::all();
        $account_list = User::all();
        $cvOnboard = CV::where('status', '=', Status::Onboard)->get();


        // Không chọn Department
        if (!isset($request->department_name) || $request->department_name=="all") {
            $department_list = Department::select("id","name")
                ->withCount(['recruit','recruit as recruit_total'=> function($query) use ($from, $to){
                    $query
                        ->whereBetween('recruits.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_total' => function($query) use ($from, $to){
                    $query
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_interview' => function($query) use ($from, $to){
                    $query
                        ->where('c_v_s.status','=',Status::Interview)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_offer' => function($query) use ($from, $to){
                    $query
                        ->where('c_v_s.status','=',Status::Offer)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_onboard' => function($query) use ($from, $to){
                    $query
                        ->where('c_v_s.status','=',Status::Onboard)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_reject' => function($query) use ($from, $to){
                    $query
                        ->where('c_v_s.status','=',Status::Reject)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_working' => function($query) use ($from, $to){
                    $query
                        ->where('c_v_s.status','=',Status::working)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }]) ->get();
        }else{
            $check_department = "department_".$request->department_name;
            $department_list = Department::select("id","name")
                ->withCount(['recruit','recruit as recruit_total'=> function($query) use ($from, $to, $depart){
                    $query
                        ->whereBetween('recruits.created_at',[$from, $to])
                        ->where('recruits.department_id',$depart);
                }])
                ->withCount(['cv','cv as cv_total' => function($query) use ($from, $to, $depart){
                    $query
                        ->whereBetween('c_v_s.created_at',[$from, $to])
                        ->where('recruits.department_id',$depart);
                }])
                ->withCount(['cv','cv as cv_interview' => function($query) use ($from, $to, $depart){
                    $query
                        ->where('c_v_s.status','=',Status::Interview)
                        ->where('recruits.department_id',$depart)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_offer' => function($query) use ($from, $to, $depart){
                    $query
                        ->where('c_v_s.status','=',Status::Offer)
                        ->where('recruits.department_id',$depart)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_onboard' => function($query) use ($from, $to, $depart){
                    $query
                        ->where('c_v_s.status','=',Status::Onboard)
                        ->where('recruits.department_id',$depart)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_reject' => function($query) use ($from, $to, $depart){
                    $query
                        ->where('c_v_s.status','=',Status::Reject)
                        ->where('recruits.department_id',$depart)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->withCount(['cv','cv as cv_working' => function($query) use ($from, $to, $depart){
                    $query
                        ->where('c_v_s.status','=',Status::working)
                        ->where('recruits.department_id',$depart)
                        ->whereBetween('c_v_s.created_at',[$from, $to]);
                }])
                ->get();
        }

        return view('Report/view', compact(
                                        'recruit_list',
                                      'vacancy_list',
                                                'account_list',
                                                'cvOnboard',
                                                'department_list',
                                                'list_cv',
                                                'from',
                                                'to',
                                                'check_department'
            ));
    }

    public function total_recruit($id){
//        $list = Recruit::all();
        $list = Recruit::where('department_id',$id)->get();
        $department_list = Department::all();
        return view('Report.total_recruit',compact('department_list','list'));
    }

    public function total_cv($id){
        $total_cv = Department::find($id)->cv;
        return view('Report.total_cv',compact('total_cv'));
    }

    public function total_index($id, $status){
        $total_cv_new = Department::find($id)->cv->where('status', $status);
        return view('Report.total_type',compact(
            'total_cv_new',
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
