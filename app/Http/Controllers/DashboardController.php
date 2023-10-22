<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // dd('berhasil');
        return view('dashboard.dashboard');
    }
}
