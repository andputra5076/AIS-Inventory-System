<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QrController extends Controller
{
    public function __construct()
    {
        if (!session()->has('username')) {
            return redirect("/");
        }
    }

    public function tanah()
    {
        $loggedInUserId = session('data')->id;
        $loggedInUserName = session('data')->name;

        $users = DB::table('users')
            ->join('aset_tanah', 'users.id', '=', 'aset_tanah.pengguna_barang')
            ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_tanah.id_unit_kerja')
            ->join('bidang', 'bidang.id', '=', 'aset_tanah.id_bidang')
            ->join('petugas', 'petugas.id', '=', 'aset_tanah.id_petugas1')
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

        return view('aset/tanah', [
            'aset_tanah' => $users,
            'unit_kerja' => $unit_kerja,
            'bidang' => $bidang,
            'petugas' => $petugas
        ]);
    }

    public function qrtanah($y, $m, $t, $id, $usernamanya, $kode, $nama, $objek, $jenis, $luas, $latitude, $longitude, $keterangan)
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
            . '<td class="column1">Luas Tanah</td>'
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
    public function addtanah(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('aset/tanah')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/aset', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('aset_tanah')->where('pengguna_barang', $loggedInUserId)->max('no_aset');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('aset_tanah')->insert([
            'nama_tanah' => $request->input('nama_tanah'),
            'nama_objek' => $request->input('nama_objek'),
            'no_aset' => $loggedInUserId . substr($nextNo, 1),
            'jenis_tanah' => $request->input('jenis_tanah'),
            'satuan' => $request->input('satuan'),
            'luas_tanah' => $request->input('luas_tanah'),
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
            'id_bidang' => $request->input('id_bidang'),
            'id_petugas1' => $request->input('id_petugas1'),
            'id_petugas2' => $request->input('id_petugas2'),
        ]);
        return redirect('aset/tanah')->with('success', 'New Data has been created successfully');
    }
    public function deletetanah($id)
    {
        $deleted = DB::table('aset_tanah')->where('id_tanah', '=', $id)->delete();



        return redirect('aset/tanah')->with('success', 'Data has been deleted successfully');
    }

    public function edittanah(Request $request)
    {
        $file = $request->file('image');
        // Check if an image file was uploaded
        // dd($request->all());
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('aset/tanah')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/aset', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('aset_tanah')
                    ->where('id_tanah', '=', $request->input('id'))
                    ->update([
                        'nama_objek' => $request->input('nama_objek'),
                        'jenis_tanah' => $request->input('jenis_tanah'),
                        'lat' => $request->input('lat'),
                        'long' => $request->input('long'),
                        'luas_tanah' => $request->input('luas_tanah'),
                        'sertifikat_kepemilikan'  => $request->input('sertifikat_kepemilikan'),
                        'kondisi' => $request->input('kondisi'),
                        'nilaiperolehan' => $request->input('nilaiperolehan'),
                        'tanggal_aset' => $request->input('tanggal_aset'),
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
                    return redirect('aset/tanah')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Handle other exceptions if needed
                // ...

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('aset/tanah')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('aset_tanah')
                ->where('id_tanah', '=', $request->input('id'))
                ->update([
                    'nama_objek' => $request->input('nama_objek'),
                    'jenis_tanah' => $request->input('jenis_tanah'),
                    'lat' => $request->input('lat'),
                    'long' => $request->input('long'),
                    'luas_tanah' => $request->input('luas_tanah'),
                    'sertifikat_kepemilikan'  => $request->input('sertifikat_kepemilikan'),
                    'kondisi' => $request->input('kondisi'),
                    'nilaiperolehan' => $request->input('nilaiperolehan'),
                    'tanggal_aset' => $request->input('tanggal_aset'),
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

        return redirect('aset/tanah')->with('success', 'New Data has been updated successfully');
    }

    public function qrall3()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatankantor.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatankantor.id_petugas2 as idusaha',  'inventaris_peralatankantor.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatankantor.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatankantor.id_petugas2 as idusaha',  'inventaris_peralatankantor.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
            $t[] = $value->kode_peralatankantor;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatankantor;
            $merek[] = $value->merek_peralatankantor;
            $jenis[] = $value->jenis_peralatankantor;
            $tipe[] = $value->tipe_peralatankantor;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatankantor . $id . '.' . $kode;
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
    public function qrall4()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_perateknikinformatika', 'users.id', '=', 'inventaris_peralatanteknikinformatika.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanteknikinformatika.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanteknikinformatika.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanteknikinformatika.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanteknikinformatika.id_petugas2 as idusaha', 'inventaris_peralatanteknikinformatika.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('inventaris_peralatanteknikinformatika', 'users.id', '=', 'inventaris_peralatanteknikinformatika.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanteknikinformatika.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanteknikinformatika.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanteknikinformatika.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanteknikinformatika.id_petugas2 as idusaha', 'inventaris_peralatanteknikinformatika.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
            $t[] = $value->kode_peralatanteknikinformatika;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatanteknikinformatika;
            $merek[] = $value->merek_peralatanteknikinformatika;
            $jenis[] = $value->jenis_peralatanteknikinformatika;
            $tipe[] = $value->tipe_peralatanteknikinformatika;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatanteknikinformatika . $id . '.' . $kode;
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
    public function qrall5()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatantekniklistrikdanmekanik', 'users.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatantekniklistrikdanmekanik.id_petugas2 as idusaha',  'inventaris_peralatantekniklistrikdanmekanik.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('inventaris_tekniklistrikdanmekanik', 'users.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatantekniklistrikdanmekanik.id_petugas2 as idusaha',  'inventaris_peralatantekniklistrikdanmekanik.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
            $t[] = $value->kode_peralatantekniklistrikdanmekanik;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatantekniklistrikdanmekanik;
            $merek[] = $value->merek_peralatantekniklistrikdanmekanik;
            $jenis[] = $value->jenis_peralatantekniklistrikdanmekanik;
            $tipe[] = $value->tipe_peralatantekniklistrikdanmekanik;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatantekniklistrikdanmekanik . $id . '.' . $kode;
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
    public function qrall6()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanac', 'users.id', '=', 'inventaris_peralatanac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanac.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanac.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanac.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanac.id_petugas2 as idusaha',  'inventaris_peralatanac.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('inventaris_peralatanac', 'users.id', '=', 'inventaris_peralatanac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanac.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanac.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanac.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanac.id_petugas2 as idusaha',  'inventaris_peralatanac.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
            $t[] = $value->kode_peralatanac;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatanac;
            $merek[] = $value->merek_peralatanac;
            $jenis[] = $value->jenis_peralatanac;
            $tipe[] = $value->tipe_peralatanac;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatanac . $id . '.' . $kode;
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
    public function qrall7()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanlift', 'users.id', '=', 'inventaris_peralatanlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanlift.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanlift.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanlift.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanlift.id_petugas2 as idusaha',  'inventaris_peralatanlift.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('inventaris_peralatanlift', 'users.id', '=', 'inventaris_peralatanlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanlift.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanlift.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanlift.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanlift.id_petugas2 as idusaha',  'inventaris_peralatanlift.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
            $t[] = $value->kode_peralatanlift;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatanlift;
            $merek[] = $value->merek_peralatanlift;
            $jenis[] = $value->jenis_peralatanlift;
            $tipe[] = $value->tipe_peralatanlift;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatanlift . $id . '.' . $kode;
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
    public function qrall8()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanmedis', 'users.id', '=', 'inventaris_peralatanmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanmedis.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanmedis.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanmedis.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanmedis.id_petugas2 as idusaha',  'inventaris_peralatanmedis.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
                ->join('inventaris_peralatanmedis', 'users.id', '=', 'inventaris_peralatanmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanmedis.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanmedis.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanmedis.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'inventaris_peralatanmedis.id_petugas2 as idusaha',  'inventaris_peralatanmedis.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
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
            $t[] = $value->kode_peralatanmedis;
            $id = $value->id_user;
            $usernamanya[] = $value->usernamanya;
            $kode = $no;
            $nama[]  = $value->nama_peralatanmedis;
            $merek[] = $value->merek_peralatanmedis;
            $jenis[] = $value->jenis_peralatanmedis;
            $tipe[] = $value->tipe_peralatanmedis;
            $keterangan[] = $ket;


            $gabung[] = $y . $m .
                $value->kode_peralatanmedis . $id . '.' . $kode;
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

    public function qralltanah()
    {
        $loggedInUserId = session('data')->id;

        if ($loggedInUserId == '1') {
            $users = DB::table('users')
                ->join('aset_tanah', 'users.id', '=', 'aset_tanah.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_tanah.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'aset_tanah.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'aset_tanah.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'aset_tanah.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->get();
            $unit_kerja = DB::table('unit_kerja')->get();
            $bidang = DB::table('bidang')->get();
            $petugas = DB::table('petugas')->get();
        } else {
            $users = DB::table('users')
                ->join('aset_tanah', 'users.id', '=', 'aset_tanah.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'aset_tanah.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'aset_tanah.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'aset_tanah.id_petugas1')
                ->select('*', 'bidang.id as bidangid', 'aset_tanah.pengguna_barang as idusaha', 'unit_kerja.id as idkerja', 'unit_kerja.name as namakerja', 'users.name as usernamanya', 'users.id as id_user', 'bidang.name as bidangnama', 'petugas.name as petugasnama', 'petugas.id as idpetugas')
                ->where('users.id', $loggedInUserId)
                ->get();
            $unit_kerja = DB::table('unit_kerja')->where('id_unit_usaha', $loggedInUserId)->get();
            $bidang = DB::table('bidang')->where('id_unit_usaha', $loggedInUserId)->get();
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

    public function peralatankantor()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatankantor.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
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
                ->join('inventaris_peralatankantor', 'users.id', '=', 'inventaris_peralatankantor.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatankantor.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatankantor.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatankantor.id_petugas1')
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

        return view('inventaris/peralatankantor', ['inventaris_peralatankantor' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }
    public function addperalatankantor(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatankantor')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatankantor')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatankantor')->insert([
            'nama_peralatankantor' => $request->input('nama_peralatankantor'),
            'merek_peralatankantor' => $request->input('merek_peralatankantor'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'tipe_peralatankantor' => $request->input('tipe_peralatankantor'),
            'jenis_peralatankantor' => $request->input('jenis_peralatankantor'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_peralatankantor' => $request->input('spesifikasi_peralatankantor'),
            'kondisi' => $request->input('kondisi'),
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
        return redirect('inventaris/peralatankantor')->with('success', 'New Data has been created successfully');
    }
    public function editperalatankantor(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatankantor')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatankantor')
                    ->where('id_peralatankantor', '=', $request->input('id'))
                    ->update([
                        'nama_peralatankantor' => $request->input('nama_peralatankantor'),
                        'jenis_peralatankantor' => $request->input('jenis_peralatankantor'),
                        'merek_peralatankantor' => $request->input('merek_peralatankantor'),
                        'tipe_peralatankantor' => $request->input('tipe_peralatankantor'),
                        'spesifikasi_peralatankantor' => $request->input('spesifikasi_peralatankantor'),
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
                    return redirect('inventaris/peralatankantor')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatankantor')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatankantor')
                ->where('id_peralatankantor', '=', $request->input('id'))
                ->update([
                    'nama_peralatankantor' => $request->input('nama_peralatankantor'),
                    'jenis_peralatankantor' => $request->input('jenis_peralatankantor'),
                    'merek_peralatankantor' => $request->input('merek_peralatankantor'),
                    'tipe_peralatankantor' => $request->input('tipe_peralatankantor'),
                    'spesifikasi_peralatankantor' => $request->input('spesifikasi_peralatankantor'),
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

        return redirect('inventaris/peralatankantor')->with('success', 'New Data has been updated successfully');
    }
    public function deleteperalatankantor($id)
    {
        $deleted = DB::table('inventaris_peralatankantor')->where('id_peralatankantor', '=', $id)->delete();


        return redirect('inventaris/peralatankantor')->with('success', 'Data has been deleted successfully');
    }
    public function peralatanteknikinformatika()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanteknikinformatika', 'users.id', '=', 'inventaris_peralatanteknikinformatika.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanteknikinformatika.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanteknikinformatika.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanteknikinformatika.id_petugas1')
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
                ->join('inventaris_peralatanteknikinformatika', 'users.id', '=', 'inventaris_peralatanteknikinformatika.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanteknikinformatika.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanteknikinformatika.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanteknikinformatika.id_petugas1')
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

        return view('inventaris/peralatanteknikinformatika', ['inventaris_peralatanteknikinformatika' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }

    public function addperalatanteknikinformatika(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatanteknikinformatika')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatanteknikinformatika')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatanteknikinformatika')->insert([
            'nama_peralatanteknikinformatika' => $request->input('nama_peralatanteknikinformatika'),
            'merek_peralatanteknikinformatika' => $request->input('merek_peralatanteknikinformatika'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'tipe_peralatanteknikinformatika' => $request->input('tipe_peralatanteknikinformatika'),
            'jenis_peralatanteknikinformatika' => $request->input('jenis_peralatanteknikinformatika'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_peralatanteknikinformatika' => $request->input('spesifikasi_peralatanteknikinformatika'),
            'kondisi' => $request->input('kondisi'),
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
        return redirect('inventaris/peralatanteknikinformatika')->with('success', 'New Data has been created successfully');
    }
    public function editperalatanteknikinformatika(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatanteknikinformatika')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatanteknikinformatika')
                    ->where('id_peralatanteknikinformatika', '=', $request->input('id'))
                    ->update([
                        'nama_peralatanteknikinformatika' => $request->input('nama_peralatanteknikinformatika'),
                        'jenis_peralatanteknikinformatika' => $request->input('jenis_peralatanteknikinformatika'),
                        'merek_peralatanteknikinformatika' => $request->input('merek_peralatanteknikinformatika'),
                        'tipe_peralatanteknikinformatika' => $request->input('tipe_peralatanteknikinformatika'),
                        'spesifikasi_peralatanteknikinformatika' => $request->input('spesifikasi_peralatanteknikinformatika'),
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
                    return redirect('inventaris/peralatanteknikinformatika')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatanteknikinformatika')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatanteknikinformatika')
                ->where('id_peralatanteknikinformatika', '=', $request->input('id'))
                ->update([
                    'nama_peralatanteknikinformatika' => $request->input('nama_peralatanteknikinformatika'),
                    'jenis_peralatanteknikinformatika' => $request->input('jenis_peralatanteknikinformatika'),
                    'merek_peralatanteknikinformatika' => $request->input('merek_peralatanteknikinformatika'),
                    'tipe_peralatanteknikinformatika' => $request->input('tipe_peralatanteknikinformatika'),
                    'spesifikasi_peralatanteknikinformatika' => $request->input('spesifikasi_peralatanteknikinformatika'),
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

        return redirect('inventaris/peralatanteknikinformatika')->with('success', 'New Data has been updated successfully');
    }

    public function deleteperalatanteknikinformatika($id)
    {
        $deleted = DB::table('inventaris_peralatanteknikinformatika')->where('id_peralatanteknikinformatika', '=', $id)->delete();

        return redirect('inventaris/peralatanteknikinformatika')->with('success', 'Data has been deleted successfully');
    }


    public function peralatantekniklistrikdanmekanik()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatantekniklistrikdanmekanik', 'users.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_petugas1')
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
                ->join('inventaris_peralatantekniklistrikdanmekanik', 'users.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatantekniklistrikdanmekanik.id_petugas1')
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

        return view('inventaris/peralatantekniklistrikdanmekanik', ['inventaris_peralatantekniklistrikdanmekanik' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }


    public function addperalatantekniklistrikdanmekanik(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatantekniklistrikdanmekanik')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatantekniklistrikdanmekanik')->insert([
            'nama_peralatantekniklistrikdanmekanik' => $request->input('nama_peralatantekniklistrikdanmekanik'),
            'merek_peralatantekniklistrikdanmekanik' => $request->input('merek_peralatantekniklistrikdanmekanik'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'tipe_peralatantekniklistrikdanmekanik' => $request->input('tipe_peralatantekniklistrikdanmekanik'),
            'jenis_peralatantekniklistrikdanmekanik' => $request->input('jenis_peralatantekniklistrikdanmekanik'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_peralatantekniklistrikdanmekanik' => $request->input('spesifikasi_peralatantekniklistrikdanmekanik'),
            'kondisi' => $request->input('kondisi'),
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
        return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('success', 'New Data has been created successfully');
    }

    public function editperalatantekniklistrikdanmekanik(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatantekniklistrikdanmekanik')
                    ->where('id_peralatantekniklistrikdanmekanik', '=', $request->input('id'))
                    ->update([
                        'nama_peralatantekniklistrikdanmekanik' => $request->input('nama_peralatantekniklistrikdanmekanik'),
                        'jenis_peralatantekniklistrikdanmekanik' => $request->input('jenis_peralatantekniklistrikdanmekanik'),
                        'merek_peralatantekniklistrikdanmekanik' => $request->input('merek_peralatantekniklistrikdanmekanik'),
                        'tipe_peralatantekniklistrikdanmekanik' => $request->input('tipe_peralatantekniklistrikdanmekanik'),
                        'spesifikasi_peralatantekniklistrikdanmekanik' => $request->input('spesifikasi_peralatantekniklistrikdanmekanik'),
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
                    return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatantekniklistrikdanmekanik')
                ->where('id_peralatantekniklistrikdanmekanik', '=', $request->input('id'))
                ->update([
                    'nama_peralatantekniklistrikdanmekanik' => $request->input('nama_peralatantekniklistrikdanmekanik'),
                    'jenis_peralatantekniklistrikdanmekanik' => $request->input('jenis_peralatantekniklistrikdanmekanik'),
                    'merek_peralatantekniklistrikdanmekanik' => $request->input('merek_peralatantekniklistrikdanmekanik'),
                    'tipe_peralatantekniklistrikdanmekanik' => $request->input('tipe_peralatantekniklistrikdanmekanik'),
                    'spesifikasi_peralatantekniklistrikdanmekanik' => $request->input('spesifikasi_peralatantekniklistrikdanmekanik'),
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

        return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('success', 'New Data has been updated successfully');
    }

    public function deleteperalatantekniklistrikdanmekanik($id)
    {
        $deleted = DB::table('inventaris_peralatantekniklistrikdanmekanik')->where('id_peralatantekniklistrikdanmekanik', '=', $id)->delete();



        return redirect('inventaris/peralatantekniklistrikdanmekanik')->with('success', 'Data has been deleted successfully');
    }



    public function addperalatanac(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatanac')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatanac')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatanac')->insert([
            'nama_peralatanac' => $request->input('nama_peralatanac'),
            'merek_peralatanac' => $request->input('merek_peralatanac'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'tipe_peralatanac' => $request->input('tipe_peralatanac'),
            'jenis_peralatanac' => $request->input('jenis_peralatanac'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_peralatanac' => $request->input('spesifikasi_peralatanac'),
            'kondisi' => $request->input('kondisi'),
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
        return redirect('inventaris/peralatanac')->with('success', 'New Data has been created successfully');
    }

    public function deleteperalatanac($id)
    {
        $deleted = DB::table('inventaris_peralatanac')->where('id_peralatanac', '=', $id)->delete();



        return redirect('inventaris/peralatanac')->with('success', 'Data has been deleted successfully');
    }

    public function editperalatanac(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatanac')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatanac')
                    ->where('id_peralatanac', '=', $request->input('id'))
                    ->update([
                        'nama_peralatanac' => $request->input('nama_peralatanac'),
                        'jenis_peralatanac' => $request->input('jenis_peralatanac'),
                        'merek_peralatanac' => $request->input('merek_peralatanac'),
                        'tipe_peralatanac' => $request->input('tipe_peralatanac'),
                        'spesifikasi_peralatanac' => $request->input('spesifikasi_peralatanac'),
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
                    return redirect('inventaris/peralatanac')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatanac')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatanac')
                ->where('id_peralatanac', '=', $request->input('id'))
                ->update([
                    'nama_peralatanac' => $request->input('nama_peralatanac'),
                    'jenis_peralatanac' => $request->input('jenis_peralatanac'),
                    'merek_peralatanac' => $request->input('merek_peralatanac'),
                    'tipe_peralatanac' => $request->input('tipe_peralatanac'),
                    'spesifikasi_peralatanac' => $request->input('spesifikasi_peralatanac'),
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

        return redirect('inventaris/peralatanac')->with('success', 'New Data has been updated successfully');
    }

    public function peralatanac()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanac', 'users.id', '=', 'inventaris_peralatanac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanac.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanac.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanac.id_petugas1')
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
                ->join('inventaris_peralatanac', 'users.id', '=', 'inventaris_peralatanac.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanac.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanac.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanac.id_petugas1')
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

        return view('inventaris/peralatanac', ['inventaris_peralatanac' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }

    public function peralatanlift()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanlift', 'users.id', '=', 'inventaris_peralatanlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanlift.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanlift.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanlift.id_petugas1')
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
                ->join('inventaris_peralatanlift', 'users.id', '=', 'inventaris_peralatanlift.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanlift.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanlift.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanlift.id_petugas1')
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

        return view('inventaris/peralatanlift', ['inventaris_peralatanlift' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }

    public function addperalatanlift(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatanlift')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatanlift')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatanlift')->insert([
            'nama_peralatanlift' => $request->input('nama_peralatanlift'),
            'merek_peralatanlift' => $request->input('merek_peralatanlift'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'tipe_peralatanlift' => $request->input('tipe_peralatanlift'),
            'jenis_peralatanlift' => $request->input('jenis_peralatanlift'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_peralatanlift' => $request->input('spesifikasi_peralatanlift'),
            'kondisi' => $request->input('kondisi'),
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
        return redirect('inventaris/peralatanlift')->with('success', 'New Data has been created successfully');
    }

    public function deleteperalatanlift($id)
    {
        $deleted = DB::table('inventaris_peralatanlift')->where('id_peralatanlift', '=', $id)->delete();


        return redirect('inventaris/peralatanlift')->with('success', 'Data has been deleted successfully');
    }

    public function editperalatanlift(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatanlift')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatanlift')
                    ->where('id_peralatanlift', '=', $request->input('id'))
                    ->update([
                        'nama_peralatanlift' => $request->input('nama_peralatanlift'),
                        'jenis_peralatanlift' => $request->input('jenis_peralatanlift'),
                        'merek_peralatanlift' => $request->input('merek_peralatanlift'),
                        'tipe_peralatanlift' => $request->input('tipe_peralatanlift'),
                        'spesifikasi_peralatanlift' => $request->input('spesifikasi_peralatanlift'),
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
                    return redirect('inventaris/peralatanlift')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatanlift')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatanlift')
                ->where('id_peralatanlift', '=', $request->input('id'))
                ->update([
                    'nama_peralatanlift' => $request->input('nama_peralatanlift'),
                    'jenis_peralatanlift' => $request->input('jenis_peralatanlift'),
                    'merek_peralatanlift' => $request->input('merek_peralatanlift'),
                    'tipe_peralatanlift' => $request->input('tipe_peralatanlift'),
                    'spesifikasi_peralatanlift' => $request->input('spesifikasi_peralatanlift'),
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

        return redirect('inventaris/peralatanlift')->with('success', 'Data has been updated successfully');
    }

    public function peralatanmedis()
    {
        if (session('data')->id == '1') {
            $users = DB::table('users')
                ->join('inventaris_peralatanmedis', 'users.id', '=', 'inventaris_peralatanmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanmedis.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanmedis.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanmedis.id_petugas1')
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
                ->join('inventaris_peralatanmedis', 'users.id', '=', 'inventaris_peralatanmedis.pengguna_barang')
                ->join('unit_kerja', 'unit_kerja.id', '=', 'inventaris_peralatanmedis.id_unit_kerja')
                ->join('bidang', 'bidang.id', '=', 'inventaris_peralatanmedis.id_bidang')
                ->join('petugas', 'petugas.id', '=', 'inventaris_peralatanmedis.id_petugas1')
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

        return view('inventaris/peralatanmedis', ['inventaris_peralatanmedis' => $users, 'unit_kerja' => $unit_kerja, 'bidang' => $bidang, 'petugas' => $petugas]);
    }

    public function addperalatanmedis(Request $request)
    {
        $file = $request->file('image');
        $ext = explode('.', $file->getClientOriginalName());
        if ($ext[count($ext) - 1] != 'jpeg' && $ext[count($ext) - 1] != 'png' && $ext[count($ext) - 1] != 'jpg') {
            return redirect('inventaris/peralatanmedis')->with('error', 'Image Files are not supported');
        }
        $file->move(public_path() . '/assets/images/inventaris', $file->getClientOriginalName());
        $loggedInUserId = session('data')->id; // Mendapatkan ID pengguna yang sedang login
        $lastInventaris = DB::table('inventaris_peralatanmedis')->where('pengguna_barang', $loggedInUserId)->max('no_inventaris');
        $nextNo = str_pad((int)$lastInventaris + 1, 7, '0', STR_PAD_LEFT);
        DB::table('inventaris_peralatanmedis')->insert([
            'nama_peralatanmedis' => $request->input('nama_peralatanmedis'),
            'merek_peralatanmedis' => $request->input('merek_peralatanmedis'),
            'no_inventaris' => $loggedInUserId . substr($nextNo, 1),
            'tipe_peralatanmedis' => $request->input('tipe_peralatanmedis'),
            'jenis_peralatanmedis' => $request->input('jenis_peralatanmedis'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'spesifikasi_peralatanmedis' => $request->input('spesifikasi_peralatanmedis'),
            'kondisi' => $request->input('kondisi'),
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
        return redirect('inventaris/peralatanmedis')->with('success', 'New Data has been created successfully');
    }

    public function editperalatanmedis(Request $request)
    {
        $file = $request->file('image');

        // Check if an image file was uploaded
        // dd($request->all());
        if ($file) {
            try {
                $ext = $file->getClientOriginalExtension();
                $allowedExtensions = ['jpeg', 'png', 'jpg'];

                if (!in_array($ext, $allowedExtensions)) {
                    return redirect('inventaris/peralatanmedis')->with('error', 'Image Files are not supported');
                }

                $uniqueFileName = uniqid() . '.' . $ext;
                $file->move(public_path() . '/assets/images/inventaris', $uniqueFileName);

                // Update data in the database, including the new image filename
                $loggedInUserId = session('data')->id;

                DB::table('inventaris_peralatanmedis')
                    ->where('id_peralatanmedis', '=', $request->input('id'))
                    ->update([
                        'nama_peralatanmedis' => $request->input('nama_peralatanmedis'),
                        'jenis_peralatanmedis' => $request->input('jenis_peralatanmedis'),
                        'merek_peralatanmedis' => $request->input('merek_peralatanmedis'),
                        'tipe_peralatanmedis' => $request->input('tipe_peralatanmedis'),
                        'spesifikasi_peralatanmedis' => $request->input('spesifikasi_peralatanmedis'),
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
                    return redirect('inventaris/peralatanmedis')->with('error', 'The file "' . $file->getClientOriginalName() . '" exceeds the upload_max_filesize directive (limit is 2048 KiB).');
                }

                // Log the error for debugging purposes
                Log::error($e);

                // Return a generic error message
                return redirect('inventaris/peralatanmedis')->with('error', 'An error occurred while uploading the file.');
            }
        } else {
            // Update data in the database without changing the image filename
            $loggedInUserId = session('data')->id;

            DB::table('inventaris_peralatanmedis')
                ->where('id_peralatanmedis', '=', $request->input('id'))
                ->update([
                    'nama_peralatanmedis' => $request->input('nama_peralatanmedis'),
                    'jenis_peralatanmedis' => $request->input('jenis_peralatanmedis'),
                    'merek_peralatanmedis' => $request->input('merek_peralatanmedis'),
                    'tipe_peralatanmedis' => $request->input('tipe_peralatanmedis'),
                    'spesifikasi_peralatanmedis' => $request->input('spesifikasi_peralatanmedis'),
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

        return redirect('inventaris/peralatanmedis')->with('success', 'Data has been updated successfully');
    }

    public function deleteperalatanmedis($id)
    {
        $deleted = DB::table('inventaris_peralatanmedis')->where('id_peralatanmedis', '=', $id)->delete();


        return redirect('inventaris/peralatanmedis')->with('success', 'Data has been deleted successfully');
    }
}
