<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    public function loginpage()
    {
        $data['meta_title'] = "loginpage";
        return view('auth.login', $data);
    }
    public function login_post(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password],true))
        {
            if(Auth::User()->is_role == "1"){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect('/')->with('error', 'admin not available');
            }
        }
        else{
            return redirect('/')->back()->with('error', 'please enter correct crecenditials');

        }
    }

    public function registerpage()
    {
        $data['meta_title'] = "registerpage";

        return view('auth.register', $data);
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:10|max:15|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->is_role = 1;
        $user->save();
    
        return redirect('/')->with('success', 'Registration process is successfully done');
    }
        public function logout(){
        Auth::logout();
        return redirect('/');
    }



  
}
