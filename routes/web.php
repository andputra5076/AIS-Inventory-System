<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('welcome', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/master', [HomeController::class, 'master'])->name('master');
Route::get('/unitkerja', [HomeController::class, 'unitkerja'])->name('unitkerja');
Route::post('/addunitkerja', [HomeController::class, 'addunitkerja'])->name('addunitkerja');
Route::post('/editunitkerja', [HomeController::class, 'editunitkerja'])->name('editunitkerja');
Route::get('/deleteunitkerja/{id}', [HomeController::class, 'deleteunitkerja'])->name('deleteunitkerja');
Route::get('/bidang', [HomeController::class, 'bidang'])->name('bidang');
Route::get('/petugas', [HomeController::class, 'petugas'])->name('petugas');
Route::get('/editprofil', [EditProfilController::class, 'editprofil'])->name('editprofil');
Route::get('/inventaris/kendaraan', [HomeController::class, 'kendaraan'])->name('kendaraan');
Route::get('/inventaris/peralatantelekomunikasi', [HomeController::class, 'peralatantelekomunikasi'])->name('peralatantelekomunikasi');
Route::get('/inventaris/peralatankantor', [HomeController::class, 'peralatankantor'])->name('peralatankantor');
Route::get('/inventaris/peralatanteknikinformatika', [HomeController::class, 'peralatanteknikinformatika'])->name('peralatanteknikinformatika');
Route::get('/inventaris/peralatantekniklistrikdanmekanik', [HomeController::class, 'peralatantekniklistrikdanmekanik'])->name('peralatantekniklistrikdanmekanik');
Route::get('/inventaris/peralatanac', [HomeController::class, 'peralatanac'])->name('peralatanac');
Route::get('/inventaris/peralatanlift', [HomeController::class, 'peralatanlift'])->name('peralatanlift');
Route::get('/inventaris/peralatanmedis', [HomeController::class, 'peralatanmedis'])->name('peralatanmedis');
Route::get('/aset/tanah', [HomeController::class, 'tanah'])->name('tanah');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
