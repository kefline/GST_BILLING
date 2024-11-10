<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    // 



    public function forgotpassword()
    {
        return view('auth.forgot_password');
    }


    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $message = $status === Password::RESET_LINK_SENT
            ? 'A password reset link has been sent to your email.'
            : 'There was an issue sending the reset link. Please try again later.';

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['message' => __($message)])
            : back()->withErrors(['email' => __($message)]);
    }


    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('message', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
