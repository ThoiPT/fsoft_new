<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
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
        $recruit_list = Recruit::where('status', '=', 1) -> get();
        return view('dashboard', compact('recruit_list'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
