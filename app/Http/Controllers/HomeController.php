<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
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

    public function master()
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


        return view('master', ['users' => $users]);
    }
    public function unitkerja()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('unit_kerja', 'users.id', '=', 'unit_kerja.id_unit_usaha')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('unit_kerja', 'users.id', '=', 'unit_kerja.id_unit_usaha')
                ->where('users.kode', '=', session('data')->kode)
                ->get();
        }

        if (!session()->has('username')) {
            return redirect("/");
        }

        return view('unit_kerja/unitkerja', ['unit_kerja' => $users]);
    }

    public function bidang()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('bidang')->get();

        return view('bidang/bidang', ['bidang' => $users]);
    }
    public function petugas()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();
        return view('petugas/petugas', ['petugas' => $users]);
    }
    public function addunitkerja(Request $request)
    {
        DB::table('unit_kerja')->insert([
            'name' => $request->input('name'),
            'id_unit_usaha' => $request->input('id_unit_usaha'),
        ]);
        return redirect('/unitkerja')->with('success', 'New Data has been created successfully');
    }
    public function editunitkerja(Request $request)
    {
        DB::table('unit_kerja')
            ->where('id', $request->input('id'))
            ->update(['name' => $request->input('name')]);
        return redirect('/unitkerja')->with('success', 'Data has been updated successfully');
    }
    public function deleteunitkerja($id)
    {
        $deleted = DB::table('unit_kerja')->where('id', '=', $id)->delete();
        return redirect('/unitkerja')->with('success', 'Data has been deleted successfully');
    }
    public function editprofil()
    {
    }


    public function kendaraan()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/kendaraan', ['petugas' => $users]);
    }
    public function addkendaraan()
    {
    }
    public function editkendaraan()
    {
    }
    public function deletekendaraan()
    {
    }
    public function peralatantelekomunikasi()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatantelekomunikasi', ['petugas' => $users]);
    }
    public function addperalatantelekomunikasi()
    {
    }
    public function editperalatantelekomunikasi()
    {
    }
    public function deleteperalatantelekomunikasi()
    {
    }
    public function peralatankantor()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatankantor', ['petugas' => $users]);
    }
    public function addperalatankantor()
    {
    }
    public function editperalatankantor()
    {
    }
    public function deleteperalatankantor()
    {
    }
    public function peralatanteknikinformatika()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatanteknikinformatika', ['petugas' => $users]);
    }
    public function peralatantekniklistrikdanmekanik()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatantekniklistrikdanmekanik', ['petugas' => $users]);
    }
    public function peralatanac()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatanac', ['petugas' => $users]);
    }
    public function peralatanlift()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatanlift', ['petugas' => $users]);
    }
    public function peralatanmedis()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('inventaris/peralatanmedis', ['petugas' => $users]);
    }
    public function tanah()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/tanah', ['petugas' => $users]);
    }
}
