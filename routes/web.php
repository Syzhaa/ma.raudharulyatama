<?php

use Illuminate\Support\Facades\Route;

//Admin Namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\UsersController;


//Controllers Namespace
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\GaleriController;

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

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');



Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman:slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::name('admin.')->group(function () {

		Route::get('/', [AdminController::class, 'index'])->name('index');
		Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
		Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::put('/profile/logo', [ProfileController::class, 'updateLogo'])->name('profile.logo.update');


		Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');

		//Resource Controller
		Route::resource('users', 'UsersController');
		Route::resource('pengumuman', 'PengumumanController');
		Route::resource('agenda', 'AgendaController');
		Route::resource('artikel', 'ArtikelController');
		Route::resource('kategori-artikel', 'KategoriArtikelController');
	});
});
