<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Qr2Controller extends Controller
{
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
    }

    public function gedungdanbangunan()
    {
        $loggedInUserId = session('data')->id;

        if ($loggedInUserId == '1') {
            $aset_gedungdanbangunan = DB::table('users')
                ->join('aset_gedungdanbangunan', 'users.id', '=', 'aset_gedungdanbangunan.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_gedungdanbangunan.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_gedungdanbangunan.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_gedungdanbangunan.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('unit_kerja')->get();
            $ruangan = DB::table('ruangan')->get();
            $petugas = DB::table('petugas')->get();
        } else {
            $aset_gedungdanbangunan = DB::table('users')
                ->join('aset_gedungdanbangunan', 'users.id', '=', 'aset_gedungdanbangunan.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_gedungdanbangunan.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_gedungdanbangunan.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_gedungdanbangunan.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.id', $loggedInUserId)
                ->get();
            $unit_kerja = DB::table('unit_kerja')->where('id_unit_usaha', $loggedInUserId)->get();
            $ruangan = DB::table('ruangan')->where('id_unit_usaha', $loggedInUserId)->get();
            $petugas = DB::table('petugas')->where('id_unit_usaha', $loggedInUserId)->get();
        }

        if (!session()->has('username')) {
            return redirect("/");
        }

        return view('aset/gedungdanbangunan', ['aset_gedungdanbangunan' => $aset_gedungdanbangunan, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }

    public function qrgedungdanbangunan($y, $m, $t, $id, $usernamanya, $kode, $nama, $objek, $jenis, $luas, $latitude, $longitude, $keterangan)
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
            . 'table.sheet0 tr { height:8pt  }'
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
            . '<td class="column0 style1 s style1" rowspan="8"><img style="margin:8px" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $gabung . '"></td>'
            . '<tr class="row1">'
            . '<td class="column1">Unit Usaha</td>'
            . '<td class="column2">:</td>'
            . '<td class="column3">' . $usernamanya . '</td>'
            . '</tr>'
            . '<tr class="row2">'
            . '<td class="column1">Nama Objek</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $objek . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Luas Gedung dan Bangunan</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $luas . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Latitude</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $latitude . '</td>'
            . '</tr>'
            . '<tr class="row3">'
            . '<td class="column1">Longitude</td>'
            . '<td class="column2 ">:</td>'
            . '<td class="column3 ">' . $longitude . '</td>'
            . '</tr>'
            . '<tr class="row4">'
            . '<td class="column1 ">Kode Aset</td>'
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

    public function qrallkendaraandanambulance()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_kendaraandanambulance', 'users.id', '=', 'aset_kendaraandanambulance.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_kendaraandanambulance.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_kendaraandanambulance.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_kendaraandanambulance.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_kendaraandanambulance.id_petugas2 as idusaha', 'aset_kendaraandanambulance.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_kendaraandanambulance', 'users.id', '=', 'aset_kendaraandanambulance.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_kendaraandanambulance.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_kendaraandanambulance.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_kendaraandanambulance.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_kendaraandanambulance.id_petugas2 as idusaha', 'aset_kendaraandanambulance.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_aset_kendaraandanambulance;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_kendaraandanambulance;
            $merek[] = $value->merek_kendaraan;
            $jenis[] = $value->jenis_kendaraan;
            $nopol[] = $value->nopol;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_aset_kendaraandanambulance     . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset/Kendaraan</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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

    public function qrallgedungdanbangunan()
    {
        $loggedInUserId = session('data')->id;

        if ($loggedInUserId == '1') {
            $aset_gedungdanbangunan = DB::table('users')
                ->join('aset_gedungdanbangunan', 'users.id', '=', 'aset_gedungdanbangunan.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_gedungdanbangunan.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_gedungdanbangunan.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_gedungdanbangunan.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_gedungdanbangunan.id_petugas2 as idusaha', 'aset_gedungdanbangunan.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('unit_kerja')->get();
            $ruangan = DB::table('ruangan')->get();
            $petugas = DB::table('petugas')->get();
        } else {
            $aset_gedungdanbangunan = DB::table('users')
                ->join('aset_gedungdanbangunan', 'users.id', '=', 'aset_gedungdanbangunan.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_gedungdanbangunan.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_gedungdanbangunan.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_gedungdanbangunan.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_gedungdanbangunan.id_petugas2 as idusaha', 'aset_gedungdanbangunan.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.id', $loggedInUserId)
                ->get();
            $unit_kerja = DB::table('unit_kerja')->where('id_unit_usaha', $loggedInUserId)->get();
            $ruangan = DB::table('ruangan')->where('id_unit_usaha', $loggedInUserId)->get();
            $petugas = DB::table('petugas')->where('id_unit_usaha', $loggedInUserId)->get();
        }
        $gabung = [];
        $t = [];
        $keterangan = [];
        $objek = [];
        $latitude = [];
        $longitude = [];
        $usernamanya = [];
        foreach ($aset_gedungdanbangunan as $key => $value) {
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_aset_gedungdanbangunan;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $objek[]  = $value->nama_objek;
            $luas[] = $value->luas_gedungdanbangunan;
            $latitude[] = $value->lat;
            $longitude[] = $value->long;
            $keterangan[] = $ket;


            $gabung[] = $y . $m . $value->kode_aset_gedungdanbangunan . $id . '.' . $kode;
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
                . '<td class="column1">Nama Objek</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $objek[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Luas Gedung/Bangunan</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $luas[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Latitude</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $latitude[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Longitude</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $longitude[$key] . '</td>'
                . '</tr>'
                . '<tr class="row4">'
                . '<td class="column1 ">Kode Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $t[$key]  . '</td>'
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


    public function addgedungdanbangunan(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/gedungdanbangunan')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('aset_gedungdanbangunan')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_gedungdanbangunan')->insert([
            'nama_gedungdanbangunan' => $request->input('nama_gedungdanbangunan'),
            'nama_objek' => $request->input('nama_objek'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'jenis_gedungdanbangunan' => $request->input('jenis_gedungdanbangunan'),
            'satuan' => $request->input('satuan'),
            'luas_gedungdanbangunan' => $request->input('luas_gedungdanbangunan'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'sertifikat_kepemilikan' => $request->input('sertifikat_kepemilikan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'lat' => $request->input('lat'),
            'long' => $request->input('long'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/gedungdanbangunan')->with('success', 'New Data has been created successfully');
    }
    public function deletegedungdanbangunan($id)
    {
        $deleted = DB::table('aset_gedungdanbangunan')->where('id_gedungdanbangunan', '=', $id)->delete();



        return redirect('aset/gedungdanbangunan')->with('success', 'Data has been deleted successfully');
    }

    public function qrallalattelekomunikasi()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alattelekomunikasi', 'users.id', '=', 'aset_alattelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alattelekomunikasi.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alattelekomunikasi.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alattelekomunikasi.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alattelekomunikasi.id_petugas2 as idusaha', 'aset_alattelekomunikasi.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alattelekomunikasi', 'users.id', '=', 'aset_alattelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alattelekomunikasi.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alattelekomunikasi.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alattelekomunikasi.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alattelekomunikasi.id_petugas2 as idusaha', 'aset_alattelekomunikasi.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alattelekomunikasi;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alattelekomunikasi;
            $merek[] = $value->merek_alattelekomunikasi;
            $jenis[] = $value->jenis_alattelekomunikasi;
            $tipe[] = $value->tipe_alattelekomunikasi;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alattelekomunikasi . $id . '.' . $kode;
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
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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

    public function qrallalatkantor()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatkantor', 'users.id', '=', 'aset_alatkantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatkantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatkantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatkantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatkantor.id_petugas2 as idusaha', 'aset_alatkantor.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatkantor', 'users.id', '=', 'aset_alatkantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatkantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatkantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatkantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatkantor.id_petugas2 as idusaha', 'aset_alatkantor.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alatkantor;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alatkantor;
            $merek[] = $value->merek_alatkantor;
            $jenis[] = $value->jenis_alatkantor;
            $tipe[] = $value->tipe_alatkantor;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alatkantor . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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
    public function qrallkomputer()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_komputer', 'users.id', '=', 'aset_komputer.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_komputer.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_komputer.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_komputer.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_komputer.id_petugas2 as idusaha', 'aset_komputer.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_komputer', 'users.id', '=', 'aset_komputer.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_komputer.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_komputer.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_komputer.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_komputer.id_petugas2 as idusaha', 'aset_komputer.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_komputer;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_komputer;
            $merek[] = $value->merek_komputer;
            $jenis[] = $value->jenis_komputer;
            $tipe[] = $value->tipe_komputer;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_komputer . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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
    public function qrallalatmekanik()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatmekanik', 'users.id', '=', 'aset_alatmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmekanik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmekanik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmekanik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatmekanik.id_petugas2 as idusaha', 'aset_alatmekanik.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatmekanik', 'users.id', '=', 'aset_alatmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmekanik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmekanik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmekanik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatmekanik.id_petugas2 as idusaha', 'aset_alatmekanik.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alatmekanik;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alatmekanik;
            $merek[] = $value->merek_alatmekanik;
            $jenis[] = $value->jenis_alatmekanik;
            $tipe[] = $value->tipe_alatmekanik;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alatmekanik . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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
    public function qrallalatac()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatac', 'users.id', '=', 'aset_alatac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatac.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatac.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatac.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatac.id_petugas2 as idusaha', 'aset_alatac.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatac', 'users.id', '=', 'aset_alatac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatac.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatac.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatac.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatac.id_petugas2 as idusaha', 'aset_alatac.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alatac;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alatac;
            $merek[] = $value->merek_alatac;
            $jenis[] = $value->jenis_alatac;
            $tipe[] = $value->tipe_alatac;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alatac . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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
    public function qrallalatlift()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatlift', 'users.id', '=', 'aset_alatlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlift.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlift.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlift.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatlift.id_petugas2 as idusaha', 'aset_alatlift.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatlift', 'users.id', '=', 'aset_alatlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlift.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlift.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlift.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatlift.id_petugas2 as idusaha', 'aset_alatlift.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alatlift;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alatlift;
            $merek[] = $value->merek_alatlift;
            $jenis[] = $value->jenis_alatlift;
            $tipe[] = $value->tipe_alatlift;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alatlift . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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
    public function qrallalatmedis()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatmedis', 'users.id', '=', 'aset_alatmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmedis.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmedis.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmedis.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatmedis.id_petugas2 as idusaha', 'aset_alatmedis.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatmedis', 'users.id', '=', 'aset_alatmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmedis.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmedis.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmedis.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatmedis.id_petugas2 as idusaha', 'aset_alatmedis.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alatmedis;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alatmedis;
            $merek[] = $value->merek_alatmedis;
            $jenis[] = $value->jenis_alatmedis;
            $tipe[] = $value->tipe_alatmedis;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alatmedis . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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
    public function qrallalatlistrik()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatlistrik', 'users.id', '=', 'aset_alatlistrik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlistrik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlistrik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlistrik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatlistrik.id_petugas2 as idusaha', 'aset_alatlistrik.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatlistrik', 'users.id', '=', 'aset_alatlistrik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlistrik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlistrik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlistrik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_alatlistrik.id_petugas2 as idusaha', 'aset_alatlistrik.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_alatlistrik;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_alatlistrik;
            $merek[] = $value->merek_alatlistrik;
            $jenis[] = $value->jenis_alatlistrik;
            $tipe[] = $value->tipe_alatlistrik;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_alatlistrik . $id . '.' . $kode;
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
                . '<td class="column1">Nama Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $nama[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Jenis Aset</td>'
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
                . '<td class="column1 ">Kode Aset</td>'
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

    public function qralltanah()
    {
        $loggedInUserId = session('data')->id;

        if ($loggedInUserId == '1') {
            $users = DB::table('users')
                ->join('aset_tanah', 'users.id', '=', 'aset_tanah.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_tanah.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_tanah.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_tanah.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_tanah.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('unit_kerja')->get();
            $ruangan = DB::table('ruangan')->get();
            $petugas = DB::table('petugas')->get();
        } else {
            $users = DB::table('users')
                ->join('aset_tanah', 'users.id', '=', 'aset_tanah.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_tanah.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_tanah.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_tanah.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'aset_tanah.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.id', $loggedInUserId)
                ->get();
            $unit_kerja = DB::table('unit_kerja')->where('id_unit_usaha', $loggedInUserId)->get();
            $ruangan = DB::table('ruangan')->where('id_unit_usaha', $loggedInUserId)->get();
            $petugas = DB::table('petugas')->where('id_unit_usaha', $loggedInUserId)->get();
        }
        $gabung = [];
        $t = [];
        $keterangan = [];
        $objek = [];
        $latitude = [];
        $longitude = [];
        $usernamanya = [];
        foreach ($users as $key => $value) {
            $no = $value->no_aset;
            $kosong = '00000000000000000000000';
            $no = $kosong . $no;
            $no = substr($no, strlen($no) - 6, strlen($no));
            $ket = $value->keterangan;
            $tanggalbarang = explode("-", $value->tanggal_aset);
            $y = $tanggalbarang[0];
            $m = $tanggalbarang[1];
            $t[] = $value->kode_aset_tanah;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $objek[]  = $value->nama_objek;
            $luas[] = $value->luas_tanah;
            $latitude[] = $value->lat;
            $longitude[] = $value->long;
            $keterangan[] = $ket;


            $gabung[] = $y . $m . $value->kode_aset_tanah . $id . '.' . $kode;
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
                . '<td class="column1">Nama Objek</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $objek[$key] . '</td>'
                . '</tr>'
                . '<tr class="row2">'
                . '<td class="column1">Luas Tanah</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $luas[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Latitude</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $latitude[$key] . '</td>'
                . '</tr>'
                . '<tr class="row3">'
                . '<td class="column1">Longitude</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $longitude[$key] . '</td>'
                . '</tr>'
                . '<tr class="row4">'
                . '<td class="column1 ">Kode Aset</td>'
                . '<td class="column2 ">:</td>'
                . '<td class="column3 ">' . $t[$key]  . '</td>'
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

    public function qrasetkendaraandanambulance($y, $m, $t, $id, $usernamanya, $kode, $nama, $jenis, $nopol, $merek, $keterangan)
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
            . '<td class="column1">Nama Aset/Kendaraan</td>'
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

    public function kendaraandanambulance()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_kendaraandanambulance', 'users.id', '=', 'aset_kendaraandanambulance.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_kendaraandanambulance.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_kendaraandanambulance.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_kendaraandanambulance.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_kendaraandanambulance', 'users.id', '=', 'aset_kendaraandanambulance.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_kendaraandanambulance.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_kendaraandanambulance.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_kendaraandanambulance.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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
        return view('aset/kendaraandanambulance', ['aset_kendaraandanambulance' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }

    public function peralatankantor()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'inventaris_peralatankantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'inventaris_peralatankantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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

        return view('inventaris/peralatankantor', ['inventaris_peralatankantor' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }
    public function addkendaraandanambulance(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/kendaraandanambulance')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('aset_kendaraandanambulance')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_kendaraandanambulance')->insert([
            'nama_kendaraandanambulance' => $request->input('nama_kendaraandanambulance'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
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
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/kendaraandanambulance')->with('success', 'New Data has been created successfully');
    }
    public function alattelekomunikasi()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alattelekomunikasi', 'users.id', '=', 'aset_alattelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alattelekomunikasi.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alattelekomunikasi.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alattelekomunikasi.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alattelekomunikasi', 'users.id', '=', 'aset_alattelekomunikasi.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alattelekomunikasi.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alattelekomunikasi.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alattelekomunikasi.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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

        return view('aset/alattelekomunikasi', ['aset_alattelekomunikasi' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalattelekomunikasi(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alattelekomunikasi')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('aset_alattelekomunikasi')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alattelekomunikasi')->insert([
            'nama_alattelekomunikasi' => $request->input('nama_alattelekomunikasi'),
            'merek_alattelekomunikasi' => $request->input('merek_alattelekomunikasi'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alattelekomunikasi' => $request->input('tipe_alattelekomunikasi'),
            'imei1_alattelekomunikasi' => $request->input('imei1_alattelekomunikasi'),
            'imei2_alattelekomunikasi' => $request->input('imei2_alattelekomunikasi'),
            'jenis_alattelekomunikasi' => $request->input('jenis_alattelekomunikasi'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alattelekomunikasi' => $request->input('spesifikasi_alattelekomunikasi'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alattelekomunikasi')->with('success', 'New Data has been created successfully');
    }


    public function deletealattelekomunikasi($id)
    {
        $deleted = DB::table('aset_alattelekomunikasi')->where('id_alattelekomunikasi', '=', $id)->delete();



        return redirect('aset/alattelekomunikasi')->with('success', 'Data has been deleted successfully');
    }



    public function alatkantor()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatkantor', 'users.id', '=', 'aset_alatkantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatkantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatkantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatkantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatkantor', 'users.id', '=', 'aset_alatkantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatkantor.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatkantor.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatkantor.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
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

        return view('aset/alatkantor', ['aset_alatkantor' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalatkantor(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alatkantor')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('aset_alatkantor')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alatkantor')->insert([
            'nama_alatkantor' => $request->input('nama_alatkantor'),
            'merek_alatkantor' => $request->input('merek_alatkantor'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alatkantor' => $request->input('tipe_alatkantor'),
            'jenis_alatkantor' => $request->input('jenis_alatkantor'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alatkantor' => $request->input('spesifikasi_alatkantor'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alatkantor')->with('success', 'New Data has been created successfully');
    }

    public function deletealatkantor($id)
    {
        $deleted = DB::table('aset_alatkantor')->where('id_alatkantor', '=', $id)->delete();



        return redirect('aset/alatkantor')->with('success', 'Data has been deleted successfully');
    }


    public function komputer()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_komputer', 'users.id', '=', 'aset_komputer.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_komputer.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_komputer.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_komputer.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_komputer', 'users.id', '=', 'aset_komputer.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_komputer.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_komputer.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_komputer.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('data')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return view('aset/komputer', ['aset_komputer' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addkomputer(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/komputer')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Get the ID of the logged-in user
        $lastInventaris = DB::table('aset_komputer')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_komputer')->insert([
            'nama_komputer' => $request->input('nama_komputer'),
            'merek_komputer' => $request->input('merek_komputer'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_komputer' => $request->input('tipe_komputer'),
            'jenis_komputer' => $request->input('jenis_komputer'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_komputer' => $request->input('spesifikasi_komputer'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/komputer')->with('success', 'New Data has been created successfully');
    }


    public function deletekomputer($id)
    {
        $deleted = DB::table('aset_komputer')->where('id_komputer', '=', $id)->delete();



        return redirect('aset/komputer')->with('success', 'Data has been deleted successfully');
    }
    public function alatlistrik()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatlistrik', 'users.id', '=', 'aset_alatlistrik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlistrik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlistrik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlistrik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatlistrik', 'users.id', '=', 'aset_alatlistrik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlistrik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlistrik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlistrik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('data')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return view('aset/alatlistrik', ['aset_alatlistrik' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalatlistrik(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alatlistrik')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Get the ID of the logged-in user
        $lastInventaris = DB::table('aset_alatlistrik')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alatlistrik')->insert([
            'nama_alatlistrik' => $request->input('nama_alatlistrik'),
            'merek_alatlistrik' => $request->input('merek_alatlistrik'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alatlistrik' => $request->input('tipe_alatlistrik'),
            'jenis_alatlistrik' => $request->input('jenis_alatlistrik'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alatlistrik' => $request->input('spesifikasi_alatlistrik'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alatlistrik')->with('success', 'New Data has been created successfully');
    }


    public function deletealatlistrik($id)
    {
        $deleted = DB::table('aset_alatlistrik')->where('id_alatlistrik', '=', $id)->delete();


        return redirect('aset/alatlistrik')->with('success', 'Data has been deleted successfully');
    }
    public function alatmekanik()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatmekanik', 'users.id', '=', 'aset_alatmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmekanik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmekanik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmekanik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatmekanik', 'users.id', '=', 'aset_alatmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmekanik.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmekanik.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmekanik.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('data')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return view('aset/alatmekanik', ['aset_alatmekanik' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalatmekanik(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alatmekanik')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Get the ID of the logged-in user
        $lastInventaris = DB::table('aset_alatmekanik')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alatmekanik')->insert([
            'nama_alatmekanik' => $request->input('nama_alatmekanik'),
            'merek_alatmekanik' => $request->input('merek_alatmekanik'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alatmekanik' => $request->input('tipe_alatmekanik'),
            'jenis_alatmekanik' => $request->input('jenis_alatmekanik'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alatmekanik' => $request->input('spesifikasi_alatmekanik'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alatmekanik')->with('success', 'New Data has been created successfully');
    }


    public function deletealatmekanik($id)
    {
        $deleted = DB::table('aset_alatmekanik')->where('id_alatmekanik', '=', $id)->delete();


        return redirect('aset/alatmekanik')->with('success', 'Data has been deleted successfully');
    }
    public function alatac()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatac', 'users.id', '=', 'aset_alatac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatac.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatac.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatac.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatac', 'users.id', '=', 'aset_alatac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatac.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatac.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatac.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('data')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return view('aset/alatac', ['aset_alatac' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalatac(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alatac')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Get the ID of the logged-in user
        $lastInventaris = DB::table('aset_alatac')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alatac')->insert([
            'nama_alatac' => $request->input('nama_alatac'),
            'merek_alatac' => $request->input('merek_alatac'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alatac' => $request->input('tipe_alatac'),
            'jenis_alatac' => $request->input('jenis_alatac'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alatac' => $request->input('spesifikasi_alatac'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alatac')->with('success', 'New Data has been created successfully');
    }


    public function deletealatac($id)
    {
        $deleted = DB::table('aset_alatac')->where('id_alatac', '=', $id)->delete();



        return redirect('aset/alatac')->with('success', 'Data has been deleted successfully');
    }
    public function alatlift()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatlift', 'users.id', '=', 'aset_alatlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlift.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlift.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlift.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatlift', 'users.id', '=', 'aset_alatlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatlift.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatlift.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatlift.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('data')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return view('aset/alatlift', ['aset_alatlift' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalatlift(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alatlift')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Get the ID of the logged-in user
        $lastInventaris = DB::table('aset_alatlift')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alatlift')->insert([
            'nama_alatlift' => $request->input('nama_alatlift'),
            'merek_alatlift' => $request->input('merek_alatlift'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alatlift' => $request->input('tipe_alatlift'),
            'jenis_alatlift' => $request->input('jenis_alatlift'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alatlift' => $request->input('spesifikasi_alatlift'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alatlift')->with('success', 'New Data has been created successfully');
    }


    public function deletealatlift($id)
    {
        $deleted = DB::table('aset_alatlift')->where('id_alatlift', '=', $id)->delete();


        return redirect('aset/alatlift')->with('success', 'Data has been deleted successfully');
    }
    public function alatmedis()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('aset_alatmedis', 'users.id', '=', 'aset_alatmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmedis.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmedis.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmedis.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->get();
        } else {
            $users = DB::table('users')
                ->join('aset_alatmedis', 'users.id', '=', 'aset_alatmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_alatmedis.id_unit_kerja')
                ->join('ruangan', 'ruangan.id', '=', 'aset_alatmedis.id_ruangan')
                ->join('petugas', 'petugas.id', '=', 'aset_alatmedis.id_petugas1')
                ->select('*', 'ruangan.id as ruanganid', 'unit_kerja.id as idkerja', 'users.id as id_user', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'ruangan.name as ruangannama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $unit_kerja = DB::table('users')
                ->join('unit_kerja', 'unit_kerja.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $ruangan = DB::table('users')
                ->join('ruangan', 'ruangan.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
            $petugas = DB::table('users')
                ->join('petugas', 'petugas.id_unit_usaha', '=', 'users.id')
                ->where('users.name', '=', session('data')->name)
                ->get();
        }

        if (!session()->has('data')) {
            return redirect('/')->with('error', 'Please login first');
        }

        return view('aset/alatmedis', ['aset_alatmedis' => $users, 'unit_kerja' => $unit_kerja, 'ruangan' => $ruangan, 'petugas' => $petugas]);
    }


    public function addalatmedis(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/alatmedis')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Get the ID of the logged-in user
        $lastInventaris = DB::table('aset_alatmedis')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_alatmedis')->insert([
            'nama_alatmedis' => $request->input('nama_alatmedis'),
            'merek_alatmedis' => $request->input('merek_alatmedis'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'tipe_alatmedis' => $request->input('tipe_alatmedis'),
            'jenis_alatmedis' => $request->input('jenis_alatmedis'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_alatmedis' => $request->input('spesifikasi_alatmedis'),
            'kondisi' => $request->input('kondisi'),
            'nilaiperolehan' => $request->input('nilaiperolehan'),
            'tanggal_aset' => $request->input('tanggal_aset'),
            'image' => $file->getClientOriginalName(),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'pengguna_barang' => $request->input('pengguna_barang'),
            'kuasa_pengguna_barang' => $request->input('kuasa_pengguna_barang'),
            'id_unit_kerja' => $request->input('id_unit_kerja'),
            'id_ruangan' => $request->input('id_ruangan'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/alatmedis')->with('success', 'New Data has been created successfully');
    }

    public function editgedungdanbangunan(Request $request)
    {
        $file = $request->file('image');
        // Check if an image file was uploaded
        // dd($request->all());
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/gedungdanbangunan')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_gedungdanbangunan')
                    ->where('id_gedungdanbangunan', '=', $request->input('id'))
                    ->update([
                        'nama_objek' => $request->input('nama_objek'),
                        'jenis_gedungdanbangunan' => $request->input('jenis_gedungdanbangunan'),
                        'lat' => $request->input('lat'),
                        'long' => $request->input('long'),
                        'luas_gedungdanbangunan' => $request->input('luas_gedungdanbangunan'),
                        'sertifikat_kepemilikan'  => $request->input('sertifikat_kepemilikan'),
                        'kondisi' => $request->input('kondisi'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName, // Use the unique filename instead of the original filename
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/gedungdanbangunan')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Handle other exceptions if needed
                // ...

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/gedungdanbangunan')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_gedungdanbangunan')
                ->where('id_gedungdanbangunan', '=', $request->input('id'))
                ->update([
                    'nama_objek' => $request->input('nama_objek'),
                    'jenis_gedungdanbangunan' => $request->input('jenis_gedungdanbangunan'),
                    'lat' => $request->input('lat'),
                    'long' => $request->input('long'),
                    'luas_gedungdanbangunan' => $request->input('luas_gedungdanbangunan'),
                    'sertifikat_kepemilikan'  => $request->input('sertifikat_kepemilikan'),
                    'kondisi' => $request->input('kondisi'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkendaraan method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/gedungdanbangunan')->with('success', 'New Data has been updated successfully');
    }

    public function editkendaraandanambulance(Request $request)
    {
        $file = $request->file('image');
        // Check if an image file was uploaded
        // dd($request->all());
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/kendaraandanambulance')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_kendaraandanambulance')
                    ->where('id_kendaraandanambulance', '=', $request->input('id'))
                    ->update([
                        'nama_kendaraandanambulance' => $request->input('nama_kendaraandanambulance'),
                        'jenis_kendaraan' => $request->input('jenis_kendaraan'),
                        'merek_kendaraan' => $request->input('merek_kendaraan'),
                        'nopol' => $request->input('nopol'),
                        'norangka' => $request->input('norangka'),
                        'nomesin' => $request->input('nomesin'),
                        'nobpkb' => $request->input('nobpkb'),
                        'kepemilikan_stnk' => $request->input('kepemilikan_stnk'),
                        'kondisi' => $request->input('kondisi'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName, // Use the unique filename instead of the original filename
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/kendaraandanambulance')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Handle other exceptions if needed
                // ...

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/kendaraandanambulance')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_kendaraandanambulance')
                ->where('id_kendaraandanambulance', '=', $request->input('id'))
                ->update([
                    'nama_kendaraandanambulance' => $request->input('nama_kendaraandanambulance'),
                    'jenis_kendaraan' => $request->input('jenis_kendaraan'),
                    'merek_kendaraan' => $request->input('merek_kendaraan'),
                    'nopol' => $request->input('nopol'),
                    'norangka' => $request->input('norangka'),
                    'nomesin' => $request->input('nomesin'),
                    'nobpkb' => $request->input('nobpkb'),
                    'kepemilikan_stnk' => $request->input('kepemilikan_stnk'),
                    'kondisi' => $request->input('kondisi'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    // The 'image' field will not be updated, so it will retain the existing value.
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkendaraan method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/kendaraandanambulance')->with('success', 'New Data has been updated successfully');
    }

    public function editalattelekomunikasi(Request $request)
    {
        $file = $request->file('image');

        // dd($request->all());
        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alattelekomunikasi')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alattelekomunikasi')
                    ->where('id_alattelekomunikasi', '=', $request->input('id'))
                    ->update([
                        'nama_alattelekomunikasi' => $request->input('nama_alattelekomunikasi'),
                        'jenis_alattelekomunikasi' => $request->input('jenis_alattelekomunikasi'),
                        'merek_alattelekomunikasi' => $request->input('merek_alattelekomunikasi'),
                        'tipe_alattelekomunikasi' => $request->input('tipe_alattelekomunikasi'),
                        'imei1_alattelekomunikasi' => $request->input('imei1_alattelekomunikasi'),
                        'imei2_alattelekomunikasi' => $request->input('imei2_alattelekomunikasi'),
                        'spesifikasi_alattelekomunikasi' => $request->input('spesifikasi_alattelekomunikasi'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alattelekomunikasi')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alattelekomunikasi')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alattelekomunikasi')
                ->where('id_alattelekomunikasi', '=', $request->input('id'))
                ->update([
                    'nama_alattelekomunikasi' => $request->input('nama_alattelekomunikasi'),
                    'jenis_alattelekomunikasi' => $request->input('jenis_alattelekomunikasi'),
                    'merek_alattelekomunikasi' => $request->input('merek_alattelekomunikasi'),
                    'tipe_alattelekomunikasi' => $request->input('tipe_alattelekomunikasi'),
                    'imei1_alattelekomunikasi' => $request->input('imei1_alattelekomunikasi'),
                    'imei2_alattelekomunikasi' => $request->input('imei2_alattelekomunikasi'),
                    'spesifikasi_alattelekomunikasi' => $request->input('spesifikasi_alattelekomunikasi'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkendaraan method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alattelekomunikasi')->with('success', 'New Data has been updated successfully');
    }
    public function editalatkantor(Request $request)
    {
        $file = $request->file('image');

        // dd($request->all());
        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alatkantor')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alatkantor')
                    ->where('id_alatkantor', '=', $request->input('id'))
                    ->update([
                        'nama_alatkantor' => $request->input('nama_alatkantor'),
                        'jenis_alatkantor' => $request->input('jenis_alatkantor'),
                        'merek_alatkantor' => $request->input('merek_alatkantor'),
                        'tipe_alatkantor' => $request->input('tipe_alatkantor'),
                        'spesifikasi_alatkantor' => $request->input('spesifikasi_alatkantor'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alatkantor')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alatkantor')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alatkantor')
                ->where('id_alatkantor', '=', $request->input('id'))
                ->update([
                    'nama_alatkantor' => $request->input('nama_alatkantor'),
                    'jenis_alatkantor' => $request->input('jenis_alatkantor'),
                    'merek_alatkantor' => $request->input('merek_alatkantor'),
                    'tipe_alatkantor' => $request->input('tipe_alatkantor'),
                    'spesifikasi_alatkantor' => $request->input('spesifikasi_alatkantor'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkendaraan method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alatkantor')->with('success', 'New Data has been updated successfully');
    }
    public function editkomputer(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/komputer')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_komputer')
                    ->where('id_komputer', '=', $request->input('id'))
                    ->update([
                        'nama_komputer' => $request->input('nama_komputer'),
                        'jenis_komputer' => $request->input('jenis_komputer'),
                        'merek_komputer' => $request->input('merek_komputer'),
                        'tipe_komputer' => $request->input('tipe_komputer'),
                        'spesifikasi_komputer' => $request->input('spesifikasi_komputer'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/komputer')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/komputer')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_komputer')
                ->where('id_komputer', '=', $request->input('id'))
                ->update([
                    'nama_komputer' => $request->input('nama_komputer'),
                    'jenis_komputer' => $request->input('jenis_komputer'),
                    'merek_komputer' => $request->input('merek_komputer'),
                    'tipe_komputer' => $request->input('tipe_komputer'),
                    'spesifikasi_komputer' => $request->input('spesifikasi_komputer'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editkomputer method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/komputer')->with('success', 'New Data has been updated successfully');
    }
    public function editalatlistrik(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alatlistrik')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alatlistrik')
                    ->where('id_alatlistrik', '=', $request->input('id'))
                    ->update([
                        'nama_alatlistrik' => $request->input('nama_alatlistrik'),
                        'jenis_alatlistrik' => $request->input('jenis_alatlistrik'),
                        'merek_alatlistrik' => $request->input('merek_alatlistrik'),
                        'tipe_alatlistrik' => $request->input('tipe_alatlistrik'),
                        'spesifikasi_alatlistrik' => $request->input('spesifikasi_alatlistrik'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alatlistrik')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alatlistrik')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alatlistrik')
                ->where('id_alatlistrik', '=', $request->input('id'))
                ->update([
                    'nama_alatlistrik' => $request->input('nama_alatlistrik'),
                    'jenis_alatlistrik' => $request->input('jenis_alatlistrik'),
                    'merek_alatlistrik' => $request->input('merek_alatlistrik'),
                    'tipe_alatlistrik' => $request->input('tipe_alatlistrik'),
                    'spesifikasi_alatlistrik' => $request->input('spesifikasi_alatlistrik'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editalatlistrik method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alatlistrik')->with('success', 'New Data has been updated successfully');
    }
    public function editalatmekanik(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alatmekanik')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alatmekanik')
                    ->where('id_alatmekanik', '=', $request->input('id'))
                    ->update([
                        'nama_alatmekanik' => $request->input('nama_alatmekanik'),
                        'jenis_alatmekanik' => $request->input('jenis_alatmekanik'),
                        'merek_alatmekanik' => $request->input('merek_alatmekanik'),
                        'tipe_alatmekanik' => $request->input('tipe_alatmekanik'),
                        'spesifikasi_alatmekanik' => $request->input('spesifikasi_alatmekanik'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alatmekanik')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alatmekanik')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alatmekanik')
                ->where('id_alatmekanik', '=', $request->input('id'))
                ->update([
                    'nama_alatmekanik' => $request->input('nama_alatmekanik'),
                    'jenis_alatmekanik' => $request->input('jenis_alatmekanik'),
                    'merek_alatmekanik' => $request->input('merek_alatmekanik'),
                    'tipe_alatmekanik' => $request->input('tipe_alatmekanik'),
                    'spesifikasi_alatmekanik' => $request->input('spesifikasi_alatmekanik'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editalatmekanik method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alatmekanik')->with('success', 'New Data has been updated successfully');
    }
    public function editalatac(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alatac')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alatac')
                    ->where('id_alatac', '=', $request->input('id'))
                    ->update([
                        'nama_alatac' => $request->input('nama_alatac'),
                        'jenis_alatac' => $request->input('jenis_alatac'),
                        'merek_alatac' => $request->input('merek_alatac'),
                        'tipe_alatac' => $request->input('tipe_alatac'),
                        'spesifikasi_alatac' => $request->input('spesifikasi_alatac'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alatac')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alatac')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alatac')
                ->where('id_alatac', '=', $request->input('id'))
                ->update([
                    'nama_alatac' => $request->input('nama_alatac'),
                    'jenis_alatac' => $request->input('jenis_alatac'),
                    'merek_alatac' => $request->input('merek_alatac'),
                    'tipe_alatac' => $request->input('tipe_alatac'),
                    'spesifikasi_alatac' => $request->input('spesifikasi_alatac'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editalatac method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alatac')->with('success', 'New Data has been updated successfully');
    }
    public function editalatlift(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alatlift')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alatlift')
                    ->where('id_alatlift', '=', $request->input('id'))
                    ->update([
                        'nama_alatlift' => $request->input('nama_alatlift'),
                        'jenis_alatlift' => $request->input('jenis_alatlift'),
                        'merek_alatlift' => $request->input('merek_alatlift'),
                        'tipe_alatlift' => $request->input('tipe_alatlift'),
                        'spesifikasi_alatlift' => $request->input('spesifikasi_alatlift'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alatlift')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alatlift')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alatlift')
                ->where('id_alatlift', '=', $request->input('id'))
                ->update([
                    'nama_alatlift' => $request->input('nama_alatlift'),
                    'jenis_alatlift' => $request->input('jenis_alatlift'),
                    'merek_alatlift' => $request->input('merek_alatlift'),
                    'tipe_alatlift' => $request->input('tipe_alatlift'),
                    'spesifikasi_alatlift' => $request->input('spesifikasi_alatlift'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editalatlift method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alatlift')->with('success', 'New Data has been updated successfully');
    }
    public function editalatmedis(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/alatmedis')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_alatmedis')
                    ->where('id_alatmedis', '=', $request->input('id'))
                    ->update([
                        'nama_alatmedis' => $request->input('nama_alatmedis'),
                        'jenis_alatmedis' => $request->input('jenis_alatmedis'),
                        'merek_alatmedis' => $request->input('merek_alatmedis'),
                        'tipe_alatmedis' => $request->input('tipe_alatmedis'),
                        'spesifikasi_alatmedis' => $request->input('spesifikasi_alatmedis'),
                        'kondisi' => $request->input('kondisi'),
                        'jumlah' => $request->input('jumlah'),
                        'satuan' => $request->input('satuan'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'nilai_residu' => $request->input('nilai_residu'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
                        'masa_manfaat' => $request->input('masa_manfaat'),
                        'image' => $uniqueFileName,
                        'alamat' => $request->input('alamat'),
                        'keterangan' => $request->input('keterangan'),
                        'id_unit_kerja' => $request->input('id_unit_kerja'),
                        'id_ruangan' => $request->input('id_ruangan'),
                        'id_petugas1' => $request->input('id_petugas1'),
                        'id_petugas2' => $request->input('id_petugas2'),
                    ]);
            } catch (\Exception $e) {
                // Check if the error message indicates the file exceeds upload_max_filesize
                if (strpos($e->getMessage(), 'exceeds your upload_max_filesize') !== false) {
                    return redirect('aset/alatmedis')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/alatmedis')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_alatmedis')
                ->where('id_alatmedis', '=', $request->input('id'))
                ->update([
                    'nama_alatmedis' => $request->input('nama_alatmedis'),
                    'jenis_alatmedis' => $request->input('jenis_alatmedis'),
                    'merek_alatmedis' => $request->input('merek_alatmedis'),
                    'tipe_alatmedis' => $request->input('tipe_alatmedis'),
                    'spesifikasi_alatmedis' => $request->input('spesifikasi_alatmedis'),
                    'kondisi' => $request->input('kondisi'),
                    'jumlah' => $request->input('jumlah'),
                    'satuan' => $request->input('satuan'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'nilai_residu' => $request->input('nilai_residu'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
                    'masa_manfaat' => $request->input('masa_manfaat'),
                    'alamat' => $request->input('alamat'),
                    'keterangan' => $request->input('keterangan'),
                    'id_unit_kerja' => $request->input('id_unit_kerja'),
                    'id_ruangan' => $request->input('id_ruangan'),
                    'id_petugas1' => $request->input('id_petugas1'),
                    'id_petugas2' => $request->input('id_petugas2'),
                ]);
        }

        // Call the editalatmedis method (assuming it contains additional logic)
        // Enable query log

        // Your Eloquent query executed by using get()

        return redirect('aset/alatmedis')->with('success', 'New Data has been updated successfully');
    }

    public function deletealatmedis($id)
    {
        $deleted = DB::table('aset_alatmedis')->where('id_alatmedis', '=', $id)->delete();



        return redirect('aset/alatmedis')->with('success', 'Data has been deleted successfully');
    }



    public function deletekendaraandanambulance($id)
    {
        $deleted = DB::table('aset_kendaraandanambulance')->where('id_kendaraandanambulance', '=', $id)->delete();



        return redirect('aset/kendaraandanambulance')->with('success', 'Data has been deleted successfully');
    }
}
