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
        $data = DB::table('users')->where('username', $input['username'])->where('password', md5($input['password']))->first();
        if ($data) {

            $request->session()->flash('success', 'Login Successfully');

            $request->session()->put('username', $input['username']);

            $request->session()->put('data', $data);

            return redirect('welcome');
        } else {
            $request->session()->flash('error', 'Login fail Check our Username or Password!!');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        session()->flush();
        return redirect('/');
    }
}
