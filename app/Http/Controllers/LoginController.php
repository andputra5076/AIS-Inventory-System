<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $input = $request->input();

        // Check if there is a login attempt cooldown in session
        if ($request->session()->has('login_attempts') && $request->session()->has('last_failed_attempt')) {
            $loginAttempts = $request->session()->get('login_attempts');
            $lastFailedAttempt = $request->session()->get('last_failed_attempt');

            // If the cooldown has not expired, prevent login and show an error message
            $cooldownDuration = 30; // 30 seconds cooldown
            if ($loginAttempts >= 5 && (time() - $lastFailedAttempt) < $cooldownDuration) {
                return redirect('/')->with('error', 'Too many login attempts. Please try again later.');
            }

            // If the cooldown has expired, reset login attempts counter
            if ((time() - $lastFailedAttempt) >= $cooldownDuration) {
                $request->session()->forget('login_attempts');
                $request->session()->forget('last_failed_attempt');
            }
        }

        $data = DB::table('users')->where('username', $input['username'])->where('password', md5($input['password']))->first();
        if ($data) {
            $request->session()->flash('success', 'Login Successfully');
            $request->session()->put('username', $input['username']);
            $request->session()->put('data', $data);

            // Reset login attempts on successful login
            $request->session()->forget('login_attempts');
            $request->session()->forget('last_failed_attempt');

            return redirect('welcome');
        } else {
            // Increment login attempts and store the timestamp of the last failed attempt
            $loginAttempts = $request->session()->get('login_attempts', 0) + 1;
            $request->session()->put('login_attempts', $loginAttempts);
            $request->session()->put('last_failed_attempt', time());

            $request->session()->flash('error', 'Login fail Check our Username or Password!!');
            return redirect('/');
        }
    }


    public function actionlogout()
    {
        // Periksa apakah data pengguna ada dalam session
        if (session()->has('data')) {
            session()->flush();
            return redirect('welcome')->with('success', 'You have been logged out Successfully');
        }
    }
}
