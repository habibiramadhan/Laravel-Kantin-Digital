<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

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
        // if (Auth::user()->hasRole('admin')) {
        //     return redirect()->route('admin.home');
        // } elseif (Auth::user()->hasRole('kasir')){
        //     return view('kasir.dashboard', ['greeting'=>$this->greeting()]);
        // }

        return view('dashboard', ['greeting'=>$this->greeting()]);
    
    }

    private function greeting()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H');
        $name = Auth::user()->name;
        if ($jam >= 18) {
            $greeting = "Good Night ". $name;
        } elseif ($jam >= 12) {
            $greeting = "Good Afternoon ". $name;
        } elseif ($jam < 12) {
            $greeting = "Good Morning ". $name;
        }
        return $greeting;
    }

    
}
