<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    private function greeting()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H');
        $name = Auth::user()->name;
        if ($jam >= 18) {
            $greeting = "Selamat Malam ". $name;
        } elseif ($jam >= 12) {
            $greeting = "Selamat Siang ". $name;
        } elseif ($jam < 12) {
            $greeting = "Selmat Pagi ". $name;
        }
        return $greeting;
    }

    public function dashboard()
    {
        return view('kasir.dashboard', ['greeting'=>$this->greeting()]);
    }


}
