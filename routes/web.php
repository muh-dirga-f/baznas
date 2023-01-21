<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PembayaranController;

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

/*
 * ROUTER USER
 */

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Sandhika Galih',
        'email' => 'sandhikagalih@gmail.com',
        'image' => 'sandhika.jpg'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

/*
 * ROUTER ADMIN
 */
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('berita');
    Route::post('/admin/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::post('/admin/berita/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/admin/berita/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::post('/admin/berita/delete', [BeritaController::class, 'delete'])->name('berita.delete');

    Route::get('/admin/pencairan', [PencairanController::class, 'index'])->name('pencairan');
    Route::post('/admin/pencairan/store', [PencairanController::class, 'store'])->name('pencairan.store');
    Route::post('/admin/pencairan/edit', [PencairanController::class, 'edit'])->name('pencairan.edit');
    Route::post('/admin/pencairan/update', [PencairanController::class, 'update'])->name('pencairan.update');
    Route::post('/admin/pencairan/delete', [PencairanController::class, 'delete'])->name('pencairan.delete');

    Route::get('/admin/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

    Route::get('/admin/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi');
    Route::get('/admin/konfirmasi/reject', [KonfirmasiController::class, 'statusReject'])->name('konfirmasi-statusReject');
    Route::get('/admin/konfirmasi/confirm', [KonfirmasiController::class, 'statusConfirm'])->name('konfirmasi-statusConfirm');
    Route::post('/admin/konfirmasi/store', [KonfirmasiController::class, 'store'])->name('konfirmasi.store');
});

Route::get('/bayar-zakat', [PembayaranController::class, 'bayarZakat']);
Route::post('/bayar-zakat/store', [PembayaranController::class, 'store']);

Route::get('/kalkulator-zakat', function () {
    return view('kalkulatorzakat', [
        'title' => 'Kalkulator Zakat',
        'active' => 'kalkulator'
    ]);
});
