<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('/editprofil');
    }
}
