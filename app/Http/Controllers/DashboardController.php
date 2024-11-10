<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::User()->is_role == 1) {
            return view('admin.dashboard');
        }
    }
}
