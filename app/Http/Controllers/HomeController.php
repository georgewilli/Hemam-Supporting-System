<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->role == '1') {
                return redirect('/admin/services');
            } else {
                $user = Auth::user();

                return view('pages.home', ['user' => $user]);
            }
        }

        return view('pages.home');
    }
}
