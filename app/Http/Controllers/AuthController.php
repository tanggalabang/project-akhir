<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash; //mengubah password
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function apiLogin(Request $request)
    {
        // return view('auth.login');

        // $remember = !empty($request->remember) ? true : false;

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->user_type == 1) {
                // return redirect('admin/dashboard');
                return response()->json($request->all(), 200);
            } else if (Auth::user()->user_type == 2) {
                // return redirect('teacher/dashboard');
            }
            //    else if (Auth::user()->user_type == 3) {
            //     return redirect('student/dashboard');
            //   } else if (Auth::user()->user_type == 4) {
            //     return redirect('parent/dashboard');
            //   }

        } else {
            // return redirect()->back()->with('error', 'Please enter currect email and password');
            // return response()->json($request->all(), 200);
        }
        // return response()->json($request->all(), 200);
    }

    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter currect email and password');
        }
    }

    // public function forgotpassword()
    // {
    //   return view('auth.forgot');
    // }

    // // fotgot password
    // public function PostForgotPassword(Request $request)
    // {
    //   $user = User::getEmailSingle($request->email);
    //   if (!empty($user)) {
    //     $user->remember_token = Str::random(30);
    //     $user->save();
    //     Mail::to($user->email)->send(new ForgotPasswordMail($user));
    //     return redirect()->back()->with('success', "Please check your email and reset your password.");
    //   } else {
    //     return redirect()->back()->with('error', "Email not found in the system.");
    //   }
    // }

    // public function reset($remember_token)
    // {
    //   $user = User::getTokenSingle($remember_token);
    //   if (!empty($user)) {
    //     $data['user'] = $user;
    //     return view('auth.reset', $data);
    //   } else {
    //     abort(404);
    //   }
    // }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
