<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function laporan()
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


        return view('laporan/laporan', ['users' => $users]);
    }

    public function profil()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
        $users = DB::table('users')->get();

        return view('editprofil', ['users' => $users]);
    }

    public function updateprofil(Request $request)
    {

        // Dapatkan ID pengguna dari sesi

        $input = $request->input();
        $userId = session('data')->id;
        $imageName = $request->file('image');
        $password = $request->input('password');

        if (empty($imageName)) {
            $imageName = session('data')->image;
        } else {
            $ext = explode('.', $imageName->getClientOriginalName());
            if (!in_array($ext[count($ext) - 1], ['jpeg', 'png', 'jpg'])) {
                return redirect('/editprofil')->with('error', 'Image Files are not supported');
            }
            $uniqueFileName = uniqid() . '.' . $ext[count($ext) - 1];
            $imageName->move(public_path() . '/assets/images/users', $uniqueFileName);
            $imageName = $uniqueFileName;
        }

        if (empty($password)) {
            $password = session('data')->password;
        } else {
            $password = md5($password);
        }

        DB::table('users')
            ->where('id', $userId)
            ->update([
                'image' => $imageName,
                'password' => $password,
            ]);

        // Update the session data with the new image and password
        $data = session('data');
        $data->image = $imageName;
        $data->password = $password;
        $request->session()->put('data', $data);

        return redirect('/editprofil')->with('success', 'Data has been updated successfully');
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
                ->join('unit_kerja', 'unit_kerja.id', '=', 'bidang.id_unit_kerja')
                ->select('*', 'bidang.id as bidangid', 'bidang.id_unit_usaha as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('bidang', 'users.id', '=', 'bidang.id_unit_usaha')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'bidang.id_unit_kerja')
                ->select('*', 'bidang.id as bidangid', 'bidang.id_unit_usaha as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('username')) {
            return redirect("/");
        }
        return view('bidang/bidang', ['bidang' => $users, 'unit_kerja' => $unit_kerja]);
    }
    public function petugas()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('petugas', 'users.id', '=', 'petugas.id_unit_usaha')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'petugas.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'petugas.id_bidang')
                ->select('*', 'petugas.id as petugasid', 'petugas.id_unit_usaha as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.id as idbidang', 'bidang.name as bidangnama', 'petugas.name as petugasnama')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('petugas', 'users.id', '=', 'petugas.id_unit_usaha')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'petugas.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'petugas.id_bidang')
                ->select('*', 'petugas.id as petugasid', 'petugas.id_unit_usaha as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.id as idbidang', 'bidang.name as bidangnama', 'petugas.name as petugasnama')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        if (!session()->has('username')) {
            return redirect("/");
        }
        return view('petugas/petugas', ['petugas' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang]);
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

    public function kendaraan()
    {
        $loggedInUserId = session('data')->id;
        $loggedInUserName = session('data')->name;

        $users = DB::table('users')
            ->join('inventaris_kendaraan', 'users.id', '=', 'inventaris_kendaraan.pengguna_barang')
            ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_kendaraan.id_unit_kerja')
            ->join('bidang', 'bidang.id', '=', 'inventaris_kendaraan.id_bidang')
            ->join('petugas', 'petugas.id', '=', 'inventaris_kendaraan.id_petugas1')
            ->select('*', 'bidang.id as bidangid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas');

        $unit_kerja = DB::table('users')
            ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id');

        $bidang = DB::table('users')
            ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id');

        $petugas = DB::table('users')
            ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id');

        if ($loggedInUserId == '1') {
            $users = $users->get();
            $unit_kerja = $unit_kerja->get();
            $bidang = $bidang->get();
            $petugas = $petugas->get();
        } else {
            $users = $users->where('users.name', '=', $loggedInUserName)->get();
            $unit_kerja = $unit_kerja->where('users.name', '=', $loggedInUserName)->get();
            $bidang = $bidang->where('users.name', '=', $loggedInUserName)->get();
            $petugas = $petugas->where('users.name', '=', $loggedInUserName)->get();
        }

        if (!session()->has('username')) {
            return redirect("/");
        }

        return view('inventaris/kendaraan', [
            'inventaris_kendaraan' => $users,
            'unit_kerja' => $unit_kerja,
            'bidang' => $bidang,
            'petugas' => $petugas
        ]);
    }

    public function qr($y, $m, $t, $id, $usernamanya, $kode, $nama, $jenis, $nopol, $merek, $keterangan)
    {
        $gabung = $y . $m . $t . $id . '.' . $kode;

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
            . '<html>'
            . '<head>'
            . '<meta http-equiv="Content-Type" content="text/html charset=utf-8">'
            . '<meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">'
            . '<meta name="author" content="user" />'
            . '<meta name="company" content="Microsoft Corporation" />'
            . '<style type="text/css">'
            . 'html { font-family:Calibri, Arial, Helvetica, sans-serif font-size:11pt background-color:white }'

            . 'div.comment { display:none }'
            . 'table {  }'
            . '.b { text-align:center }'
            . '.e { text-align:center }'
            . '.f { text-align:right }'
            . '.inlineStr { text-align:left }'
            . '.n { text-align:right }'
            . '.s { text-align:left }'
            . 'td.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'td.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'table.sheet0 col.col0 { width:125pt }'
            . 'table.sheet0 col.col1 { width:100pt }'
            . 'table.sheet0 col.col2 { width:8pt }'
            . 'table.sheet0 col.col3 { width:200pt }'
            . 'table.sheet0 tr { height:10pt }'
            . '</style>'
            . '</head>'
            . ''
            . '<body>'
            . '<style>'
            . '@page { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . 'body { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . '</style>'
            . '<table style="border-style: solid;" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">'
            . '<col class="col0">'
            . '<col class="col1">'
            . '<col class="col2">'
            . '<col class="col3">'
            . '<tbody>'
            . '<td class="column0 style1 s style1" rowspan="8"><img style="margin:10px" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $gabung . '"></td>'
            . '<tr class="row1">'
            . '<td class="column1">Unit Usaha</td>'
            . '<td class="column2">:</td>'
            . '<td class="column3">' . $usernamanya . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Nama Barang/Kendaraan</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $nama . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Jenis Kendaraan</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $jenis . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">No Polisi</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $nopol . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Merek</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $merek . '</td>'
            . '</tr>'
            . '<tr class="row4">'
            . '<td class="column1 ">Kode Barang</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $t . '</td>'
            . '</tr>'
            . '<tr class="row5">'
            . '<td class="column1 ">Keterangan</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $keterangan . '</td>'
            . '</tr>'
            . '<tr class="row6">'
            . ''
            . '</tr>'
            . '</tbody>'
            . '</table>'
            . ''
            . ''
            . '<script type="text/javascript">
window.print();
setTimeout(window.close, 5000);
</script>'
            . '</body>'
            . '</html>'
            . '';
        echo $html;
    }
    public function qr2($y, $m, $t, $id, $usernamanya, $kode, $nama, $jenis, $merek, $tipe, $keterangan)
    {


        $gabung = $y . $m . $t . $id . '.' . $kode;

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
            . '<html>'
            . '<head>'
            . '<meta http-equiv="Content-Type" content="text/html charset=utf-8">'
            . '<meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">'
            . '<meta name="author" content="user" />'
            . '<meta name="company" content="Microsoft Corporation" />'
            . '<style type="text/css">'
            . 'html { font-family:Calibri, Arial, Helvetica, sans-serif font-size:11pt background-color:white }'

            . 'div.comment { display:none }'
            . 'table {  }'
            . '.b { text-align:center }'
            . '.e { text-align:center }'
            . '.f { text-align:right }'
            . '.inlineStr { text-align:left }'
            . '.n { text-align:right }'
            . '.s { text-align:left }'
            . 'td.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'td.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'table.sheet0 col.col0 { width:125pt }'
            . 'table.sheet0 col.col1 { width:100pt }'
            . 'table.sheet0 col.col2 { width:8pt }'
            . 'table.sheet0 col.col3 { width:200pt }'
            . 'table.sheet0 tr { height:10pt }'
            . '</style>'
            . '</head>'
            . ''
            . '<body>'
            . '<style>'
            . '@page { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . 'body { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . '</style>'
            . '<table style="border-style: solid;" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">'
            . '<col class="col0">'
            . '<col class="col1">'
            . '<col class="col2">'
            . '<col class="col3">'
            . '<tbody>'
            . '<td class="column0 style1 s style1" rowspan="8"><img style="margin:10px" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $gabung . '"></td>'
            . '<tr class="row1">'
            . '<td class="column1">Unit Usaha</td>'
            . '<td class="column2">:</td>'
            . '<td class="column3">' . htmlspecialchars($usernamanya) . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Nama Barang</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($nama) . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Jenis Barang</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($jenis) . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Merek</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($merek) . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Tipe</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($tipe) . '</td>'
            . '</tr>'
            . '<tr class="row4">'
            . '<td class="column1 ">Kode Barang</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($t) . '</td>'
            . '</tr>'
            . '<tr class="row5">'
            . '<td class="column1 ">Keterangan</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($keterangan) . '</td>'
            . '</tr>'
            . '<tr class="row6">'
            . ''
            . '</tr>'
            . '</tbody>'
            . '</table>'
            . ''
            . ''
            . '<script type="text/javascript">
window.print();
setTimeout(window.close, 5000);
</script>'
            . '</body>'
            . '</html>'
            . '';
        echo $html;
    }
    public function qr22($y, $m, $t, $id, $usernamanya, $kode, $nama, $jenis, $merek, $tipe, $keterangan)
    {


        $gabung = $y . $m . $t . $id . '.' . $kode;

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
            . '<html>'
            . '<head>'
            . '<meta http-equiv="Content-Type" content="text/html charset=utf-8">'
            . '<meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">'
            . '<meta name="author" content="user" />'
            . '<meta name="company" content="Microsoft Corporation" />'
            . '<style type="text/css">'
            . 'html { font-family:Calibri, Arial, Helvetica, sans-serif font-size:11pt background-color:white }'

            . 'div.comment { display:none }'
            . 'table {  }'
            . '.b { text-align:center }'
            . '.e { text-align:center }'
            . '.f { text-align:right }'
            . '.inlineStr { text-align:left }'
            . '.n { text-align:right }'
            . '.s { text-align:left }'
            . 'td.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'td.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'table.sheet0 col.col0 { width:125pt }'
            . 'table.sheet0 col.col1 { width:100pt }'
            . 'table.sheet0 col.col2 { width:8pt }'
            . 'table.sheet0 col.col3 { width:200pt }'
            . 'table.sheet0 tr { height:10pt }'
            . '</style>'
            . '</head>'
            . ''
            . '<body>'
            . '<style>'
            . '@page { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . 'body { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . '</style>'
            . '<table style="border-style: solid;" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">'
            . '<col class="col0">'
            . '<col class="col1">'
            . '<col class="col2">'
            . '<col class="col3">'
            . '<tbody>'
            . '<td class="column0 style1 s style1" rowspan="8"><img style="margin:10px" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $gabung . '"></td>'
            . '<tr class="row1">'
            . '<td class="column1">Unit Usaha</td>'
            . '<td class="column2">:</td>'
            . '<td class="column3">' . htmlspecialchars($usernamanya) . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Nama Aset</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($nama) . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Jenis Aset</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($jenis) . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Merek</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($merek) . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Tipe</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($tipe) . '</td>'
            . '</tr>'
            . '<tr class="row4">'
            . '<td class="column1 ">Kode Aset</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($t) . '</td>'
            . '</tr>'
            . '<tr class="row5">'
            . '<td class="column1 ">Keterangan</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . htmlspecialchars($keterangan) . '</td>'
            . '</tr>'
            . '<tr class="row6">'
            . ''
            . '</tr>'
            . '</tbody>'
            . '</table>'
            . ''
            . ''
            . '<script type="text/javascript">
window.print();
setTimeout(window.close, 5000);
</script>'
            . '</body>'
            . '</html>'
            . '';
        echo $html;
    }

    public function qrall()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_kendaraan', 'users.id', '=', 'inventaris_kendaraan.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_kendaraan.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_kendaraan.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_kendaraan.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_kendaraan.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'users.id as id_user',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('inventaris_kendaraan', 'users.id', '=', 'inventaris_kendaraan.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_kendaraan.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_kendaraan.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_kendaraan.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_kendaraan.pengguna_barang as idusaha',  'unit_kerja.id as idkerja',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        $gabung = [];
        $nama = [];
        $t = [];
        $keterangan = [];
        $merek = [];
        $jenis = [];
        $nopol = [];
        $usernamanya = [];
        foreach ($users as $key => $value) {
            $no = $value->no_inventaris;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_barang);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_barang_kendaraan;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_barang_kendaraan;
            $merek[] = $value->merek_kendaraan;
            $jenis[] = $value->jenis_kendaraan;
            $nopol[] = $value->nopol;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_barang_kendaraan . $id . '.' . $kode;
        }
        $table = '';
        foreach ($gabung as $key => $value) {

            $table = $table . '<div class="grid-item"><table style="border-style: solid;" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">'
                . '<col class="col0">'
                . '<col class="col1">'
                . '<col class="col2">'
                . '<col class="col3">'
                . '<tbody>'
                . '<td class="column0 style1 s style1" rowspan="8"><img style="margin:10px" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $gabung[$key] . '"></td>'
                . '<tr class="row1">'
                . '<td class="column1">Unit Usaha</td>'
                . '<td class="column2">:</td>'
                . '<td class="column3">' . $usernamanya[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Nama Barang/Kendaraan</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Kendaraan</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $jenis[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Nomor Polisi</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nopol[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Merek</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $merek[$key] . '</td>'
                . '</tr>'
                . '<tr class="row4">'
                . '<td class="column1 ">Kode Barang</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $t[$key] . '</td>'
                . '</tr>'
                . '<tr class="row5">'
                . '<td class="column1 ">Keterangan</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $keterangan[$key] . '</td>'
                . '</tr>'
                . '<tr class="row6">'
                . ''
                . '</tr>'
                . '</tbody>'
                . '</table></div>';
        }


        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
            . '<html>'
            . '<head>'
            . '<meta http-equiv="Content-Type" content="text/html charset=utf-8">'
            . '<meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">'
            . '<meta name="author" content="user" />'
            . '<meta name="company" content="Microsoft Corporation" />'
            . '<style type="text/css">'
            . 'html { font-family:Calibri, Arial, Helvetica, sans-serif font-size:11pt background-color:white }'

            . 'div.comment { display:none }'
            . 'table {  }'
            . '.b { text-align:center }'
            . '.e { text-align:center }'
            . '.f { text-align:right }'
            . '.inlineStr { text-align:left }'
            . '.n { text-align:right }'
            . '.s { text-align:left }'
            . 'td.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'td.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'table.sheet0 col.col0 { width:125pt }'
            . 'table.sheet0 col.col1 { width:100pt }'
            . 'table.sheet0 col.col2 { width:8pt }'
            . 'table.sheet0 col.col3 { width:170pt }'
            . 'table.sheet0 tr { height:10pt }'
            . '</style>'
            . '</head>'
            . ''
            . '<body>'
            . '<style>'
            . '@page { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . 'body { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . '.grid-container {display: grid;grid-template-columns: auto auto;}'
            . '.grid-item {margin-top:20px}'
            . '</style>'
            . '<div class="grid-container">'
            . $table
            . '</div>'
            . ''
            . ''
            . '<script type="text/javascript">
window.print();
setTimeout(window.close, 5000);
</script>'
            . '</body>'
            . '</html>'
            . '';
        echo $html;
    }
    public function qrall2()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatantelekomunikasi', 'users.id', '=', 'inventaris_peralatantelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantelekomunikasi.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantelekomunikasi.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantelekomunikasi.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatantelekomunikasi.id_petugas2 as idusaha', 'inventaris_peralatantelekomunikasi.id_petugas2 as idusaha', 'unit_kerja.id as idkerja', 'users.id as id_user',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('inventaris_peralatantelekomunikasi', 'users.id', '=', 'inventaris_peralatantelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantelekomunikasi.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantelekomunikasi.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantelekomunikasi.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatantelekomunikasi.id_petugas2 as idusaha', 'inventaris_peralatantelekomunikasi.pengguna_barang as idusaha',  'unit_kerja.id as idkerja',  'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        $gabung = [];
        $nama = [];
        $t = [];
        $keterangan = [];
        $merek = [];
        $jenis = [];
        $tipe = [];
        $usernamanya = [];
        foreach ($users as $key => $value) {
            $no = $value->no_inventaris;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_barang);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_peralatantelekomunikasi;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatantelekomunikasi;
            $merek[] = $value->merek_peralatantelekomunikasi;
            $jenis[] = $value->jenis_peralatantelekomunikasi;
            $tipe[] = $value->tipe_peralatantelekomunikasi;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatantelekomunikasi . $id . '.' . $kode;
        }
        $table = '';
        foreach ($gabung as $key => $value) {

            $table = $table . '<div class="grid-item"><table style="border-style: solid;" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">'
                . '<col class="col0">'
                . '<col class="col1">'
                . '<col class="col2">'
                . '<col class="col3">'
                . '<tbody>'
                . '<td class="column0 style1 s style1" rowspan="8"><img style="margin:10px" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $gabung[$key] . '"></td>'
                . '<tr class="row1">'
                . '<td class="column1">Unit Usaha</td>'
                . '<td class="column2">:</td>'
                . '<td class="column3">' . $usernamanya[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Nama Barang</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Barang</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $jenis[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Merek</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $merek[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Tipe</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $tipe[$key] . '</td>'
                . '</tr>'
                . '<tr class="row4">'
                . '<td class="column1 ">Kode Barang</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $t[$key] . '</td>'
                . '</tr>'
                . '<tr class="row5">'
                . '<td class="column1 ">Keterangan</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $keterangan[$key] . '</td>'
                . '</tr>'
                . '<tr class="row6">'
                . ''
                . '</tr>'
                . '</tbody>'
                . '</table></div>';
        }


        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">'
            . '<html>'
            . '<head>'
            . '<meta http-equiv="Content-Type" content="text/html charset=utf-8">'
            . '<meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">'
            . '<meta name="author" content="user" />'
            . '<meta name="company" content="Microsoft Corporation" />'
            . '<style type="text/css">'
            . 'html { font-family:Calibri, Arial, Helvetica, sans-serif font-size:11pt background-color:white }'

            . 'div.comment { display:none }'
            . 'table {  }'
            . '.b { text-align:center }'
            . '.e { text-align:center }'
            . '.f { text-align:right }'
            . '.inlineStr { text-align:left }'
            . '.n { text-align:right }'
            . '.s { text-align:left }'
            . 'td.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style0 { vertical-align:bottom border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'td.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000  font-size:11pt background-color:white }'
            . 'th.style1 { vertical-align:bottom text-align:center border-bottom:none #000000 border-top:none #000000 border-left:none #000000 border-right:none #000000 color:#000000 font-size:11pt background-color:white }'
            . 'table.sheet0 col.col0 { width:125pt }'
            . 'table.sheet0 col.col1 { width:100pt }'
            . 'table.sheet0 col.col2 { width:8pt }'
            . 'table.sheet0 col.col3 { width:170pt }'
            . 'table.sheet0 tr { height:10pt }'
            . '</style>'
            . '</head>'
            . ''
            . '<body>'
            . '<style>'
            . '@page { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . 'body { margin-left: 0.7in margin-right: 0.7in margin-top: 0.75in margin-bottom: 0.75in }'
            . '.grid-container {display: grid;grid-template-columns: auto auto;}'
            . '.grid-item {margin-top:20px}'
            . '</style>'
            . '<div class="grid-container">'
            . $table
            . '</div>'
            . ''
            . ''
            . '<script type="text/javascript">
window.print();
setTimeout(window.close, 5000);
</script>'
            . '</body>'
            . '</html>'
            . '';
        echo $html;
    }

    public function addkendaraan(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/kendaraan')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_kendaraan')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);

        DB::table('inventaris_kendaraan')->insert([
            'nama_barang_kendaraan' => $request->input('nama_barang_kendaraan'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'jenis_kendaraan' => $request->input('jenis_kendaraan'),
            'merek_kendaraan' => $request->input('merek_kendaraan'),
            'nopol' => $request->input('nopol'),
            'norangka' => $request->input('norangka'),
            'nomesin' => $request->input('nomesin'),
            'nobpkb' => $request->input('nobpkb'),
            'kepemilikan_stnk' => $request->input('kepemilikan_stnk'),
            'kondisi' => $request->input('kondisi'),
            'jumlah' => $request->input('jumlah'),
            'satuan' => $request->input('satuan'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_barang' => $request->input('tanggal_barang'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_bidang' => $request->input('id_bidang'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('inventaris/kendaraan')->with('success', 'New Data has been created successfully');
    }
    public function editkendaraan(Request $request)
    {
        $file = $request->file('image');
        // Check if an image file was uploaded
        // dd($request->all());
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/kendaraan')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_kendaraan')
                    ->where('id_kendaraan', '=', $request->input('id'))
                    ->update([
                        'nama_barang_kendaraan' => $request->input('nama_barang_kendaraan'),
                        'jenis_kendaraan' => $request->input('jenis_kendaraan'),
                        'merek_kendaraan' => $request->input('merek_kendaraan'),
                        'nopol' => $request->input('nopol'),
                        'norangka' => $request->input('norangka'),
                        'nomesin' => $request->input('nomesin'),
                        'nobpkb' => $request->input('nobpkb'),
                        'kepemilikan_stnk' => $request->input('kepemilikan_stnk'),
                        'kondisi' => $request->input('kondisi'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'tanggal_barang' => $request->input('tanggal_barang'),
                        'image' => $uniqueFileName, // Use the unique filename instead of the original filename
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_bidang' => $request->input('id_bidang'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('inventaris/kendaraan')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Handle other exceptions if needed
                // ...

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/kendaraan')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_kendaraan')
                ->where('id_kendaraan', '=', $request->input('id'))
                ->update([
                    'nama_barang_kendaraan' => $request->input('nama_barang_kendaraan'),
                    'jenis_kendaraan' => $request->input('jenis_kendaraan'),
                    'merek_kendaraan' => $request->input('merek_kendaraan'),
                    'nopol' => $request->input('nopol'),
                    'norangka' => $request->input('norangka'),
                    'nomesin' => $request->input('nomesin'),
                    'nobpkb' => $request->input('nobpkb'),
                    'kepemilikan_stnk' => $request->input('kepemilikan_stnk'),
                    'kondisi' => $request->input('kondisi'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'tanggal_barang' => $request->input('tanggal_barang'),
                    // The 'image' field will not be updated, so it will retain the existing value.
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_bidang' => $request->input('id_bidang'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkendaraan method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('inventaris/kendaraan')->with('success', 'New Data has been updated successfully');
    }

    public function deletekendaraan($id)
    {
        $deleted = DB::table('inventaris_kendaraan')->where('id_kendaraan', '=', $id)->delete();
        return redirect('inventaris/kendaraan')->with('success', 'Data has been deleted successfully');
    }
    public function peralatantelekomunikasi()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatantelekomunikasi', 'users.id', '=', 'inventaris_peralatantelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantelekomunikasi.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantelekomunikasi.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantelekomunikasi.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('inventaris_peralatantelekomunikasi', 'users.id', '=', 'inventaris_peralatantelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantelekomunikasi.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantelekomunikasi.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantelekomunikasi.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $bidang = DB::table('users')
                ->join('bidang', 'bidang.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }
        if (!session()->has('username')) {
            return redirect("/");
        }
        return view('inventaris/peralatantelekomunikasi', ['inventaris_peralatantelekomunikasi' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }
    public function addperalatantelekomunikasi(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatantelekomunikasi')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatantelekomunikasi')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatantelekomunikasi')->insert([
            'nama_peralatantelekomunikasi' => $request->input('nama_peralatantelekomunikasi'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'jenis_peralatantelekomunikasi' => $request->input('jenis_peralatantelekomunikasi'),
            'merek_peralatantelekomunikasi' => $request->input('merek_peralatantelekomunikasi'),
            'tipe_peralatantelekomunikasi' => $request->input('tipe_peralatantelekomunikasi'),
            'spesifikasi_peralatantelekomunikasi' => $request->input('spesifikasi_peralatantelekomunikasi'),
            'kondisi' => $request->input('kondisi'),
            'jumlah' => $request->input('jumlah'),
            'satuan' => $request->input('satuan'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_barang' => $request->input('tanggal_barang'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_bidang' => $request->input('id_bidang'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('inventaris/peralatantelekomunikasi')->with('success', 'New Data has been created successfully');
    }
    public function editperalatantelekomunikasi(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatantelekomunikasi')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatantelekomunikasi')
                    ->where('id_peralatantelekomunikasi', '=', $request->input('id'))
                    ->update([
                        'nama_peralatantelekomunikasi' => $request->input('nama_peralatantelekomunikasi'),
                        'jenis_peralatantelekomunikasi' => $request->input('jenis_peralatantelekomunikasi'),
                        'merek_peralatantelekomunikasi' => $request->input('merek_peralatantelekomunikasi'),
                        'tipe_peralatantelekomunikasi' => $request->input('tipe_peralatantelekomunikasi'),
                        'spesifikasi_peralatantelekomunikasi' => $request->input('spesifikasi_peralatantelekomunikasi'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'tanggal_barang' => $request->input('tanggal_barang'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_bidang' => $request->input('id_bidang'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('inventaris/peralatantelekomunikasi')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatantelekomunikasi')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatantelekomunikasi')
                ->where('id_peralatantelekomunikasi', '=', $request->input('id'))
                ->update([
                    'nama_peralatantelekomunikasi' => $request->input('nama_peralatantelekomunikasi'),
                    'jenis_peralatantelekomunikasi' => $request->input('jenis_peralatantelekomunikasi'),
                    'merek_peralatantelekomunikasi' => $request->input('merek_peralatantelekomunikasi'),
                    'tipe_peralatantelekomunikasi' => $request->input('tipe_peralatantelekomunikasi'),
                    'spesifikasi_peralatantelekomunikasi' => $request->input('spesifikasi_peralatantelekomunikasi'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'tanggal_barang' => $request->input('tanggal_barang'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_bidang' => $request->input('id_bidang'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkendaraan method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('inventaris/peralatantelekomunikasi')->with('success', 'New Data has been updated successfully');
    }
    public function deleteperalatantelekomunikasi($id)
    {
        $deleted = DB::table('inventaris_peralatantelekomunikasi')->where('id_peralatantelekomunikasi', '=', $id)->delete();

        return redirect('inventaris/peralatantelekomunikasi')->with('success', 'Data has been deleted successfully');
    }
}
