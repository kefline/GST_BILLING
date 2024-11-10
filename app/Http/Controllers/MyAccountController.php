<?php

namespace App\Http\Controllers;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    //

    public function my_account()


    {
        $data['getRecord'] = User::find(Auth::id());
        return view('admin.My_account.update',$data);
    }
    public function my_account_update(Request $request)
{
    // Validate the input, making sure to exclude the current user's email from the unique check
    $validatedData = $request->validate([
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'name' => 'required|string|max:255',
        'password' => 'nullable|min:8|confirmed'
    ]);

    // Find the currently authenticated user
    $user = User::find(Auth::id());
    
    // Update the user data
    $user->name = trim($request->name);
    $user->email = trim($request->email);
    
    // Update the password if it's provided
    if (!empty($request->password)) {
        $user->password = Hash::make(trim($request->password));
    }
    
    // Save the updated user record
    $user->save();

    // Redirect with a success message
    return redirect('admin/My_account')->with('success', 'You have successfully updated your account');
}

}
