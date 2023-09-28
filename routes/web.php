<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QrController;

// Export Inventaris
use App\Exports\inventaris_kendaraan;
use App\Exports\inventaris_peralatantelekomunikasi;
use App\Exports\inventaris_peralatanteknikinformatika;
use App\Exports\inventaris_peralatantekniklistrikdanmekanik;
use App\Exports\inventaris_peralatanac;
use App\Exports\inventaris_peralatanlift;
use App\Exports\inventaris_peralatanmedis;
use App\Exports\inventaris_peralatankantor;

// Export Aset
use App\Exports\aset_tanah;
use App\Exports\aset_gedungdanbangunan;
use App\Exports\aset_kendaraandanambulance;
use App\Exports\aset_alattelekomunikasi;
use App\Exports\aset_alatkantor;
use App\Exports\aset_alatlistrik;
use App\Exports\aset_alatmekanik;
use App\Exports\aset_alatac;
use App\Exports\aset_alatlift;
use App\Exports\aset_alatmedis;
use App\Exports\aset_komputer;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Qr2Controller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');


Route::get('welcome', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/exportinventariskendaraan', function () {
    return Excel::download(new inventaris_kendaraan, 'Data Inventaris Kendaraan.xlsx');
});
Route::get('/exportinventarisperalatantelekomunikasi', function () {
    return Excel::download(new inventaris_peralatantelekomunikasi, 'Data Inventaris Peralatan Telekomunikasi.xlsx');
});
Route::get('/exportinventarisperalatankantor', function () {
    return Excel::download(new inventaris_peralatankantor, 'Data Inventaris Peralatan Kantor.xlsx');
});
Route::get('/exportinventarisperalatanteknikinformatika', function () {
    return Excel::download(new inventaris_peralatanteknikinformatika, 'Data Inventaris Peralatan Teknik Informatika.xlsx');
});
Route::get('/exportinventarisperalatantekniklistrikdanmekanik', function () {
    return Excel::download(new inventaris_peralatantekniklistrikdanmekanik, 'Data Inventaris Peralatan Teknik Listrik dan Mekanik.xlsx');
});
Route::get('/exportinventarisperalatanac', function () {
    return Excel::download(new inventaris_peralatanac, 'Data Inventaris Peralatan AC.xlsx');
});
Route::get('/exportinventarisperalatanlift', function () {
    return Excel::download(new inventaris_peralatanlift, 'Data Inventaris Peralatan Lift.xlsx');
});
Route::get('/exportinventarisperalatanmedis', function () {
    return Excel::download(new inventaris_peralatanmedis, 'Data Inventaris Peralatan Medis.xlsx');
});
// Export Aset
Route::get('/exportasettanah', function () {
    return Excel::download(new aset_tanah, 'Data Aset Tanah.xlsx');
});
Route::get('/exportasetgedungdanbangunan', function () {
    return Excel::download(new aset_gedungdanbangunan, 'Data Aset Gedung dan Bangunan.xlsx');
});
Route::get('/exportasetkendaraandanambulance', function () {
    return Excel::download(new aset_kendaraandanambulance, 'Data Aset Kendaraan dan Ambulance.xlsx');
});
Route::get('/exportasetalattelekomunikasi', function () {
    return Excel::download(new aset_alattelekomunikasi, 'Data Aset Alat Telekomunikasi.xlsx');
});
Route::get('/exportasetalatkantor', function () {
    return Excel::download(new aset_alatkantor, 'Data Aset Alat Kantor.xlsx');
});
Route::get('/exportasetkomputer', function () {
    return Excel::download(new aset_komputer, 'Data Aset Komputer.xlsx');
});
Route::get('/exportasetalatlistrik', function () {
    return Excel::download(new aset_alatlistrik, 'Data Aset Alat Listrik.xlsx');
});
Route::get('/exportasetalatmekanik', function () {
    return Excel::download(new aset_alatmekanik, 'Data Aset Alat Mekanik.xlsx');
});
Route::get('/exportasetalatac', function () {
    return Excel::download(new aset_alatac, 'Data Aset Alat AC.xlsx');
});
Route::get('/exportasetalatlift', function () {
    return Excel::download(new aset_alatlift, 'Data Aset Alat Lift.xlsx');
});
Route::get('/exportasetalatmedis', function () {
    return Excel::download(new aset_alatmedis, 'Data Aset Alat Medis.xlsx');
});






Route::get('/master', [HomeController::class, 'master'])->name('master');
Route::get('/unitkerja', [HomeController::class, 'unitkerja'])->name('unitkerja');
Route::post('/addunitkerja', [HomeController::class, 'addunitkerja'])->name('addunitkerja');
Route::post('/editunitkerja', [HomeController::class, 'editunitkerja'])->name('editunitkerja');
Route::get('/deleteunitkerja/{id}', [HomeController::class, 'deleteunitkerja'])->name('deleteunitkerja');
Route::get('/bidang', [HomeController::class, 'bidang'])->name('bidang');
Route::post('/addbidang', [HomeController::class, 'addbidang'])->name('addbidang');
Route::post('/editbidang', [HomeController::class, 'editbidang'])->name('editbidang');
Route::get('/deletebidang/{id}', [HomeController::class, 'deletebidang'])->name('deletebidang');
Route::get('/petugas', [HomeController::class, 'petugas'])->name('petugas');
Route::get('/qrall', [HomeController::class, 'qrall'])->name('qrall');
Route::get('/qrall2', [HomeController::class, 'qrall2'])->name('qrall2');
Route::get('/qrall3', [QrController::class, 'qrall3'])->name('qrall3');
Route::get('/qrall4', [QrController::class, 'qrall4'])->name('qrall4');
Route::get('/qrall5', [HomeController::class, 'qrall5'])->name('qrall5');
Route::get('/qrall6', [QrController::class, 'qrall6'])->name('qrall6');
Route::get('/qrall7', [QrController::class, 'qrall7'])->name('qrall7');
Route::get('/qrall8', [QrController::class, 'qrall8'])->name('qrall8');
Route::get('/qralltanah', [QrController::class, 'qralltanah'])->name('qralltanah');
Route::get('/qrallgedungdanbangunan', [Qr2Controller::class, 'qrallgedungdanbangunan'])->name('qrallgedungdanbangunan');
Route::get('/qrallkendaraandanambulance', [Qr2Controller::class, 'qrallkendaraandanambulance'])->name('qrallkendaraandanambulance');
Route::get('/qrallalattelekomunikasi', [Qr2Controller::class, 'qrallalattelekomunikasi'])->name('qrallalattelekomunikasi');
Route::get('/qrallalatkantor', [Qr2Controller::class, 'qrallalatkantor'])->name('qrallalatkantor');
Route::get('/qrallkomputer', [Qr2Controller::class, 'qrallkomputer'])->name('qrallkomputer');
Route::get('/qrallalatlistrik', [Qr2Controller::class, 'qrallalatlistrik'])->name('qrallalatlistrik');
Route::get('/qrallalatmekanik', [Qr2Controller::class, 'qrallalatmekanik'])->name('qrallalatmekanik');
Route::get('/qrallalatac', [Qr2Controller::class, 'qrallalatac'])->name('qrallalatac');
Route::get('/qrallalatlift', [Qr2Controller::class, 'qrallalatlift'])->name('qrallalatlift');
Route::get('/qrallalatmedis', [Qr2Controller::class, 'qrallalatmedis'])->name('qrallalatmedis');
Route::get('/qr/{y}/{m}/{t}/{id}/{usernamanya}/{kode}/{nama}/{jenis}/{nopol}/{merek}/{keterangan}', [HomeController::class, 'qr'])->name('qr');
Route::get('/qrasetkendaraandanambulance/{y}/{m}/{t}/{id}/{usernamanya}/{kode}/{nama}/{jenis}/{nopol}/{merek}/{keterangan}', [Qr2Controller::class, 'qrasetkendaraandanambulance'])->name('qrasetkendaraandanambulance');
Route::get('/qr2/{y}/{m}/{t}/{id}/{usernamanya}/{kode}/{nama}/{jenis}/{merek}/{tipe}/{keterangan}', [HomeController::class, 'qr2'])->name('qr2');
Route::get('/qr22/{y}/{m}/{t}/{id}/{usernamanya}/{kode}/{nama}/{jenis}/{merek}/{tipe}/{keterangan}', [HomeController::class, 'qr22'])->name('qr22');
Route::get('/qrtanah/{y}/{m}/{t}/{id}/{usernamanya}/{kode}/{nama}/{objek}/{jenis}/{luas}/{latitude}/{longitude}/{keterangan}', [QrController::class, 'qrtanah'])->name('qrtanah');
Route::get('/qrgedungdanbangunan/{y}/{m}/{t}/{id}/{usernamanya}/{kode}/{nama}/{objek}/{jenis}/{luas}/{latitude}/{longitude}/{keterangan}', [Qr2Controller::class, 'qrgedungdanbangunan'])->name('qrgedungdanbangunan');
Route::post('/addpetugas', [HomeController::class, 'addpetugas'])->name('addpetugas');
Route::post('/editpetugas', [HomeController::class, 'editpetugas'])->name('editpetugas');
Route::get('/deletepetugas/{id}', [HomeController::class, 'deletepetugas'])->name('deletepetugas');
Route::get('/editprofil', [HomeController::class, 'profil'])->name('profil');
Route::post('/updateprofil', [HomeController::class, 'updateprofil'])->name('updateprofil');
Route::get('/inventaris/kendaraan', [HomeController::class, 'kendaraan'])->name('kendaraan');
Route::post('/addkendaraan', [HomeController::class, 'addkendaraan'])->name('addkendaraan');
Route::post('/editkendaraan', [HomeController::class, 'editkendaraan'])->name('editkendaraan');
Route::get('/deletekendaraan/{id}', [HomeController::class, 'deletekendaraan'])->name('deletekendaraan');
Route::get('/inventaris/peralatantelekomunikasi', [HomeController::class, 'peralatantelekomunikasi'])->name('peralatantelekomunikasi');
Route::post('/addperalatantelekomunikasi', [HomeController::class, 'addperalatantelekomunikasi'])->name('addperalatantelekomunikasi');
Route::post('/editperalatantelekomunikasi', [HomeController::class, 'editperalatantelekomunikasi'])->name('editperalatantelekomunikasi');
Route::get('/deleteperalatantelekomunikasi/{id}', [HomeController::class, 'deleteperalatantelekomunikasi'])->name('deleteperalatantelekomunikasi');
Route::get('/inventaris/peralatankantor', [QrController::class, 'peralatankantor'])->name('peralatankantor');
Route::post('/addperalatankantor', [QrController::class, 'addperalatankantor'])->name('addperalatankantor');
Route::post('/editperalatankantor', [QrController::class, 'editperalatankantor'])->name('editperalatankantor');
Route::get('/deleteperalatankantor/{id}', [QrController::class, 'deleteperalatankantor'])->name('deleteperalatankantor');
Route::get('/inventaris/peralatanteknikinformatika', [QrController::class, 'peralatanteknikinformatika'])->name('peralatanteknikinformatika');
Route::post('/addperalatanteknikinformatika', [QrController::class, 'addperalatanteknikinformatika'])->name('addperalatanteknikinformatika');
Route::post('/editperalatanteknikinformatika', [QrController::class, 'editperalatanteknikinformatika'])->name('editperalatanteknikinformatika');
Route::get('/deleteperalatanteknikinformatika/{id}', [QrController::class, 'deleteperalatanteknikinformatika'])->name('deleteperalatanteknikinformatika');
Route::get('/inventaris/peralatantekniklistrikdanmekanik', [QrController::class, 'peralatantekniklistrikdanmekanik'])->name('peralatantekniklistrikdanmekanik');
Route::post('/addperalatantekniklistrikdanmekanik', [QrController::class, 'addperalatantekniklistrikdanmekanik'])->name('addperalatantekniklistrikdanmekanik');
Route::post('/editperalatantekniklistrikdanmekanik', [QrController::class, 'editperalatantekniklistrikdanmekanik'])->name('editperalatantekniklistrikdanmekanik');
Route::get('/deleteperalatantekniklistrikdanmekanik/{id}', [QrController::class, 'deleteperalatantekniklistrikdanmekanik'])->name('deleteperalatantekniklistrikdanmekanik');
Route::get('/inventaris/peralatanac', [QrController::class, 'peralatanac'])->name('peralatanac');
Route::post('/addperalatanac', [QrController::class, 'addperalatanac'])->name('addperalatanac');
Route::post('/editperalatanac', [QrController::class, 'editperalatanac'])->name('editperalatanac');
Route::get('/deleteperalatanac/{id}', [QrController::class, 'deleteperalatanac'])->name('deleteperalatanac');
Route::get('/inventaris/peralatanlift', [QrController::class, 'peralatanlift'])->name('peralatanlift');
Route::post('/addperalatanlift', [QrController::class, 'addperalatanlift'])->name('addperalatanlift');
Route::post('/editperalatanlift', [QrController::class, 'editperalatanlift'])->name('editperalatanlift');
Route::get('/deleteperalatanlift/{id}', [QrController::class, 'deleteperalatanlift'])->name('deleteperalatanlift');
Route::get('/inventaris/peralatanmedis', [QrController::class, 'peralatanmedis'])->name('peralatanmedis');
Route::post('/addperalatanmedis', [QrController::class, 'addperalatanmedis'])->name('addperalatanmedis');
Route::post('/editperalatanmedis', [QrController::class, 'editperalatanmedis'])->name('editperalatanmedis');
Route::get('/deleteperalatanmedis/{id}', [QrController::class, 'deleteperalatanmedis'])->name('deleteperalatanmedis');
Route::get('/aset/tanah', [QrController::class, 'tanah'])->name('tanah');
Route::post('/addtanah', [QrController::class, 'addtanah'])->name('addtanah');
Route::post('/edittanah', [QrController::class, 'edittanah'])->name('edittanah');
Route::get('/deletetanah/{id}', [QrController::class, 'deletetanah'])->name('deletetanah');
Route::get('/aset/gedungdanbangunan', [Qr2Controller::class, 'gedungdanbangunan'])->name('gedungdanbangunan');
Route::post('/addgedungdanbangunan', [Qr2Controller::class, 'addgedungdanbangunan'])->name('addgedungdanbangunan');
Route::post('/editgedungdanbangunan', [Qr2Controller::class, 'editgedungdanbangunan'])->name('editgedungdanbangunan');
Route::get('/deletegedungdanbangunan/{id}', [Qr2Controller::class, 'deletegedungdanbangunan'])->name('deletegedungdanbangunan');

Route::get('/aset/kendaraandanambulance', [Qr2Controller::class, 'kendaraandanambulance'])->name('kendaraandanambulance');
Route::post('/addkendaraandanambulance', [Qr2Controller::class, 'addkendaraandanambulance'])->name('addkendaraandanambulance');
Route::post('/editkendaraandanambulance', [Qr2Controller::class, 'editkendaraandanambulance'])->name('editkendaraandanambulance');
Route::get('/deletekendaraandanambulance/{id}', [Qr2Controller::class, 'deletekendaraandanambulance'])->name('deletekendaraandanambulance');

Route::get('/aset/alattelekomunikasi', [Qr2Controller::class, 'alattelekomunikasi'])->name('alattelekomunikasi');
Route::post('/addalattelekomunikasi', [Qr2Controller::class, 'addalattelekomunikasi'])->name('addalattelekomunikasi');
Route::post('/editalattelekomunikasi', [Qr2Controller::class, 'editalattelekomunikasi'])->name('editalattelekomunikasi');
Route::get('/deletealattelekomunikasi/{id}', [Qr2Controller::class, 'deletealattelekomunikasi'])->name('deletealattelekomunikasi');

Route::get('/aset/alatkantor', [Qr2Controller::class, 'alatkantor'])->name('alatkantor');
Route::post('/addalatkantor', [Qr2Controller::class, 'addalatkantor'])->name('addalatkantor');
Route::post('/editalatkantor', [Qr2Controller::class, 'editalatkantor'])->name('editalatkantor');
Route::get('/deletealatkantor/{id}', [Qr2Controller::class, 'deletealatkantor'])->name('deletealatkantor');

Route::get('/aset/komputer', [Qr2Controller::class, 'komputer'])->name('komputer');
Route::post('/addkomputer', [Qr2Controller::class, 'addkomputer'])->name('addkomputer');
Route::post('/editkomputer', [Qr2Controller::class, 'editkomputer'])->name('editkomputer');
Route::get('/deletekomputer/{id}', [Qr2Controller::class, 'deletekomputer'])->name('deletekomputer');

Route::get('/aset/alatlistrik', [Qr2Controller::class, 'alatlistrik'])->name('alatlistrik');
Route::post('/addalatlistrik', [Qr2Controller::class, 'addalatlistrik'])->name('addalatlistrik');
Route::post('/editalatlistrik', [Qr2Controller::class, 'editalatlistrik'])->name('editalatlistrik');
Route::get('/deletealatlistrik/{id}', [Qr2Controller::class, 'deletealatlistrik'])->name('deletealatlistrik');

Route::get('/aset/alatmekanik', [Qr2Controller::class, 'alatmekanik'])->name('alatmekanik');
Route::post('/addalatmekanik', [Qr2Controller::class, 'addalatmekanik'])->name('addalatmekanik');
Route::post('/editalatmekanik', [Qr2Controller::class, 'editalatmekanik'])->name('editalatmekanik');
Route::get('/deletealatmekanik/{id}', [Qr2Controller::class, 'deletealatmekanik'])->name('deletealatmekanik');

Route::get('/aset/alatac', [Qr2Controller::class, 'alatac'])->name('alatac');
Route::post('/addalatac', [Qr2Controller::class, 'addalatac'])->name('addalatac');
Route::post('/editalatac', [Qr2Controller::class, 'editalatac'])->name('editalatac');
Route::get('/deletealatac/{id}', [Qr2Controller::class, 'deletealatac'])->name('deletealatac');

Route::get('/aset/alatlift', [Qr2Controller::class, 'alatlift'])->name('alatlift');
Route::post('/addalatlift', [Qr2Controller::class, 'addalatlift'])->name('addalatlift');
Route::post('/editalatlift', [Qr2Controller::class, 'editalatlift'])->name('editalatlift');
Route::get('/deletealatlift/{id}', [Qr2Controller::class, 'deletealatlift'])->name('deletealatlift');

Route::get('/aset/alatmedis', [Qr2Controller::class, 'alatmedis'])->name('alatmedis');
Route::post('/addalatmedis', [Qr2Controller::class, 'addalatmedis'])->name('addalatmedis');
Route::post('/editalatmedis', [Qr2Controller::class, 'editalatmedis'])->name('editalatmedis');
Route::get('/deletealatmedis/{id}', [Qr2Controller::class, 'deletealatmedis'])->name('deletealatmedis');
