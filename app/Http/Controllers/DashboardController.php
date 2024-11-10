<?php

namespace App\Http\Controllers;

use App\Models\GSTBills;
use App\Models\Parties;
use App\Models\PartiesType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {

        $partiescount =Parties::count();
        $partiestypescount = PartiesType::count();
        $users = User::count();
        $Gstbillscount = GSTBills::count();
        if (Auth::User()->is_role == 1) {
            return view('admin.dashboard',[
                'partiesCount' => $partiescount,
                'partiestypescount' => $partiestypescount,
                'users' => $users,
                'GstBills' => $Gstbillscount,  // Keep this as is

            ]);
        }
    }
}
