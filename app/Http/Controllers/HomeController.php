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
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('bidang', 'users.id', '=', 'bidang.id_unit_usaha')
                ->get();
            $users = DB::table('unit_kerja')
                ->join('bidang', 'unit_kerja.id', '=', 'bidang.id_unit_kerja')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('bidang', 'users.id', '=', 'bidang.id_unit_usaha')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        if (!session()->has('username')) {
            return redirect("/");
        }

        return view('bidang/bidang', ['bidang' => $users]);
    }
    public function petugas()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('petugas', 'users.id', '=', 'petugas.id_unit_usaha')
                ->get();
            $users = DB::table('bidang')
                ->join('petugas', 'bidang.id', '=', 'petugas.id_bidang')
                ->get();
            $users = DB::table('unit_kerja')
                ->join('petugas', 'unit_kerja.id', '=', 'petugas.id_unit_kerja')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('petugas', 'users.id', '=', 'petugas.id_unit_usaha')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        if (!session()->has('username')) {
            return redirect("/");
        }
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
    public function addbidang(Request $request)
    {
        DB::table('bidang')->insert([
            'id_unit_usaha' => $request->input('id_unit_usaha'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'name' => $request->input('name'),
        ]);
        return redirect('/bidang')->with('success', 'New Data has been created successfully');
    }
    public function editbidang(Request $request)
    {
        DB::table('bidang')
            ->where('id', $request->input('id'))
            ->update([
                'id_unit_usaha' => $request->input('id_unit_usaha'),
                'id_unit_kerja' => $request->input('id_unit_kerja'),
                'name' => $request->input('name'),
            ]);
        return redirect('/bidang')->with('success', 'Data has been updated successfully');
    }
    public function deletebidang($id)
    {
        $deleted = DB::table('bidang')->where('id', '=', $id)->delete();
        return redirect('/bidang')->with('success', 'Data has been deleted successfully');
    }
    public function addpetugas(Request $request)
    {
        DB::table('petugas')->insert([
            'name' => $request->input('name'),
            'id_unit_usaha' => $request->input('id_unit_usaha'),
            'id_bidang' => $request->input('id_bidang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
        ]);
        return redirect('/petugas')->with('success', 'New Data has been created successfully');
    }
    public function editpetugas(Request $request)
    {
        DB::table('petugas')
            ->where('id', $request->input('id'))
            ->update([
                'name' => $request->input('name'),
                'id_unit_usaha' => $request->input('id_unit_usaha'),
                'id_bidang' => $request->input('id_bidang'),
                'id_unit_kerja' => $request->input('id_unit_kerja'),
            ]);
        return redirect('/petugas')->with('success', 'Data has been updated successfully');
    }
    public function deletepetugas($id)
    {
        $deleted = DB::table('petugas')->where('id', '=', $id)->delete();
        return redirect('/petugas')->with('success', 'Data has been deleted successfully');
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
    public function gedungdanbangunan()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/gedungdanbangunan', ['petugas' => $users]);
    }
    public function kendaraandanambulance()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/kendaraandanambulance', ['petugas' => $users]);
    }
    public function alattelekomunikasi()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alattelekomunikasi', ['petugas' => $users]);
    }
    public function alatkantor()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alatkantor', ['petugas' => $users]);
    }
    public function komputer()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/komputer', ['petugas' => $users]);
    }
    public function alatlistrik()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alatlistrik', ['petugas' => $users]);
    }
    public function alatmekanik()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alatmekanik', ['petugas' => $users]);
    }
    public function alatac()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alatac', ['petugas' => $users]);
    }
    public function alatlift()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alatlift', ['petugas' => $users]);
    }
    public function alatmedis()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('petugas')->get();

        return view('aset/alatmedis', ['petugas' => $users]);
    }
}
