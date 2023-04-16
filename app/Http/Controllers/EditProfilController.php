<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditProfilController extends Controller
{

    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
    }

    public function index()
    {
        return view('home');
    }

    public function profil()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        if (session()->get('username') == 'headoffice') {
            $users = DB::table('users')->where('role', '=', 'Head Office')->get();
        }
        if (session()->get('username') == 'corporation') {
            $users = DB::table('users')->where('role', '!=', 'corporation')->get();
        }
        if (session()->get('username') == 'rsubhaktihusada') {
            $users = DB::table('users')->where('role', '=', 'RSU Bhakti Husada')->get();
        }
        if (session()->get('username') == 'rsukaliwates') {
            $users = DB::table('users')->where('role', '=', 'RSU Kaliwates')->get();
        }
        if (session()->get('username') == 'grupklinik') {
            $users = DB::table('users')->where('role', '=', 'Grup Klinik')->get();
        }


        return view('welcome', ['users' => $users]);
    }
}
