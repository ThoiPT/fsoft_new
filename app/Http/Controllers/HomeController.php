<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CV;
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
    public function index()
    {
        $recruit_list = Recruit::where('status', '=', 1) -> paginate(50);
        $vacancy_list = Vacancy::all();
        $account_list = User::all();
        $cvOnboard = CV::where('status','=', Status::Onboard)->get();
        return view('dashboard', compact('recruit_list','vacancy_list','account_list','cvOnboard'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
