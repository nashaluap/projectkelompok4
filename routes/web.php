<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\C_Menu;
use App\Http\Controllers\C_Paket;
use App\Http\Controllers\C_Pesanan;
use App\Http\Controllers\C_Pelanggan;
use App\Http\Controllers\C_Bank;
use App\Http\Controllers\C_Laporan;
use App\Http\Controllers\C_Testimoni;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\C_Notifikasi;
use App\Http\Controllers\C_Pembayaran;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Chat;
use App\Http\Controllers\C_Chatadmin;
use App\Http\Controllers\C_DashboardPelanggan;
use App\Http\Controllers\C_PesananPelanggan;

//Route::get('/', function () {
    //return view('welcome');
//});
//Route :: view('/contact','contact');
//Route :: view('/admin', 'admin/admin');
//Route::get('/', function () {
   // return view('v_index');
//});
//Route::view('/about','v_about');
//Route::view('/login','v_login');
//Route::view('/admin','admin/v_dashboard');

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'pelanggan') {
            return redirect()->route('dashboard.pelanggan');
        }
    }
    return view('v_index');  
});

//Route::get('/menu',[C_Menu::class,'index']);
Route::get('/menu/detail/{ID_menu}',[C_Menu::class,'detail']);
Route::get('/menu', [C_Menu::class, 'index'])->name('menu');
Route::get('/menu/add', [C_Menu::class, 'add']);
Route::post('/menu/insert', [C_Menu::class, 'insert']);
Route::get('/menu/edit/{ID_menu}', [C_Menu::class, 'edit']);
Route::post('/menu/update/{ID_menu}', [C_Menu::class, 'update']);
Route::get('/menu/delete/{ID_menu}', [C_Menu::class, 'delete']);

Route::get('/paket',[C_Paket::class,'index']);
Route::get('/paket/detail/{id_paket}',[C_Paket::class,'detail']);
Route::get('/paket', [C_Paket::class, 'index'])->name('paket');
Route::get('/paket/add', [C_Paket::class, 'add']);
Route::post('/paket/insert', [C_Paket::class, 'insert']);
Route::get('/paket/edit/{id_paket}', [C_Paket::class, 'edit']);
Route::post('/paket/update/{id_paket}', [C_Paket::class, 'update']);
Route::get('/paket/delete/{id_paket}', [C_Paket::class, 'delete']);

Route::get('/pesanan',[C_Pesanan::class,'index']);
Route::get('/pesanan/detail/{id_pesanan}',[C_Pesanan::class,'detail']);
Route::get('/pesanan', [C_Pesanan::class, 'index'])->name('pesanan');
Route::get('/pesanan/delete/{id_pesanan}', [C_Pesanan::class, 'delete']);

Route::get('/pelanggan',[C_Pelanggan::class,'index']);
Route::get('/pelanggan', [C_Pelanggan::class, 'index'])->name('pelanggan');
Route::get('/pelanggan/delete/{id_pelanggan}', [C_Pelanggan::class, 'delete']);
Route::get('/pelanggan/edit/{id_pelanggan}', [C_Pelanggan::class, 'edit']);
Route::post('/pelanggan/update/{id_pelanggan}', [C_Pelanggan::class, 'update']);

Route::get('/bank',[C_Bank::class,'index']);
Route::get('/bank/detail/{id_bank}',[C_Bank::class,'detail']);
Route::get('/bank', [C_Bank::class, 'index'])->name('bank');
Route::get('/bank/add', [C_Bank::class, 'add']);
Route::post('/bank/insert', [C_Bank::class, 'insert']);
Route::get('/bank/edit/{id_bank}', [C_Bank::class, 'edit']);
Route::post('/bank/update/{id_bank}', [C_Bank::class, 'update']);
Route::get('/bank/delete/{id_bank}', [C_Bank::class, 'delete']);

Route::get('/abouthanna', function () {
    return view('v_abouthanna');
});

Route::view('/index','v_abouthanna');
Route::view('/index','v_index');

Route::get('/laporan', [C_Laporan::class, 'index'])->name('v_laporan');
Route::post('/laporan/transaksi', [C_Laporan::class, 'cetakTransaksi'])->name('laporan.transaksi');
Route::get('/laporan/menu-terlaris', [C_Laporan::class, 'cetakMenuTerlaris'])->name('laporan.menuTerlaris');

Route::get('/menuhanna', [C_Menu::class, 'menuUser'])->name('menuUser');
Route::get('/menu/search', [C_Menu::class, 'search'])->name('menu.search');
Route::get('/menu/{id_menu}', [C_Menu::class, 'detailUser'])->name('menu.detail');
//Route::get('/menu/{id_menu}/add-to-cart', [C_Menu::class, 'addToCart'])->name('menu.addToCart');
Route::post('/menu/{id}/add-to-cart', [C_Menu::class, 'addToCart'])->name('menu.addToCart');
//Route::get('/cart', [C_Menu::class, 'viewCart'])->name('cart.view');
Route::get('/pemesanan', [C_Menu::class, 'v_pemesanan'])->name('pemesanan');
//Route::get('/cart/remove/{id_menu}', [C_Menu::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/remove/{id_menu}', [c_menu::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [C_Menu::class, 'viewCart'])->name('viewCart')->middleware('auth');
Route::get('/menu-hanna', [C_Menu::class, 'menuUser'])->name('menuhanna');
Route::post('/pemesanan/submit', [C_Menu::class, 'submitPemesanan'])->name('submitPemesanan');
Route::put('/pesanan/status/{id}', [C_Menu::class, 'ubahStatus'])->name('ubahStatusPesanan');
Route::put('/menu/update-status/{id}', [C_Menu::class, 'updateStatus'])->name('menu.updateStatus');
Route::get('/pesanan/sukses', [C_Pesanan::class, 'sukses'])->name('pesanan.sukses');

Route::get('/pembayaran/{id_pesanan}', [C_Pembayaran::class, 'formPembayaran'])->name('pembayaran.form');
Route::post('/pembayaran/simpan', [C_Pembayaran::class, 'simpanPembayaran'])->name('pembayaran.simpan');
Route::get('/pembayaran/bank/{id_pembayaran}', [C_Pembayaran::class, 'pilihBank'])->name('pembayaran.pilihBank');
Route::post('/pembayaran/prosesBank', [C_Pembayaran::class, 'prosesBank'])->name('pembayaran.prosesBank');

Route::get('/pembayaran/create', [C_Pembayaran::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran/store', [C_Pembayaran::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/invoice/{id}', [C_Pembayaran::class, 'invoice'])->name('pembayaran.invoice');
Route::get('/pembayaran/cetak-invoice/{id}', [C_Pembayaran::class, 'cetakInvoice'])->name('pembayaran.cetakInvoice');

Route::get('/testimoni', [C_Testimoni::class, 'index'])->name('ulasan.index');
Route::get('/testimoni/create', [C_Testimoni::class, 'create'])->name('testimoni.create');
Route::post('/testimoni/store', [C_Testimoni::class, 'store'])->name('testimoni.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/notifikasi', [C_Notifikasi::class, 'index'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/register-admin', [AuthController::class, 'showAdminOnlyRegister']);
    Route::post('/admin/register-admin', [AuthController::class, 'storeAdminOnlyRegister']);
});

Route::get('/admin/create', [AuthController::class, 'showAdminOnlyRegister'])->name('admin.create');
Route::post('/admin/store', [AuthController::class, 'storeAdminOnlyRegister'])->name('admin.store');
//Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin', [C_Dashboard::class, 'index'])->name('admin.dashboard');

// Untuk pelanggan
Route::middleware('auth')->group(function () {
    Route::get('/chat', [C_Chat::class, 'index'])->name('chat.user');
    Route::post('/chat/kirim', [C_Chat::class, 'kirim'])->name('chat.kirim');
});

// Untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/chatadmin/{id_pelanggan}', [C_Chatadmin::class, 'index']);
    Route::post('/admin/chat/kirim', [C_Chatadmin::class, 'kirim'])->name('chat.admin.kirim');
    Route::get('/admin/chat', [C_Chatadmin::class, 'daftarPelanggan'])->name('chat.admin');
});

Route::middleware(['auth', 'pelanggan'])->group(function () {
    Route::get('/dashboard/pelanggan', [C_DashboardPelanggan::class, 'index'])->name('dashboard.pelanggan');
    Route::get('/dashboard/pelanggan/pesanan/{id}', [C_DashboardPelanggan::class, 'detail'])->name('dashboard.pelanggan.detail');
    Route::get('/dashboard/pelanggan/pesanan', [C_PesananPelanggan::class, 'index'])->name('dashboard.pelanggan.pesanan');
    Route::get('/dashboard/pelanggan/pesanan/{id}', [C_PesananPelanggan::class, 'show'])->name('riwayat.pesanan.detail');
});