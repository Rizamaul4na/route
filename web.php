<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/belajar', function() {
    echo '<h1>Hello World</h1>';
    echo '<p>Sedang Belajar Laravel</p>';
});


/* 5.5 Route dengan Optional Parameter */
Route::get('/stok_barang/{jenis?}/{merek?}',
    function ($a = 'smarthphone',$b = 'samsung') {
    return"Cek sisa stok untuk $a $b";
    });


/* 5.6 Route parameter dengan regular Expression */
Route::get('/user/{id}', function ($id) {
    return "Tampilkan User dengan id = $id";
});
/* menggunakan regular expression */
Route::get('/user/{id}', function ($id) {
    return "Tampilkan User dengan id = $id";
})->where('id', '[0-9]+');
/* lebih rumit */
Route::get('/user/{id}', function ($id) {
    return "Tampilkan User dengan id = $id";
})->where('id', '[A-Z]{2}[0-9]+');


/* 5.7 Route Redirect */
Route::get('/school', function() {
    return '<h1>School</h1>';
});
Route::Redirect('/sekolah', '/school');


/* 5.8 Route Group */
/* menggunakan method Route::prefix() untuk menambah awalan ke setiap anggota route */
Route::get('/admin/mahasiswa', function () {
    return "<h1>Daftar Mahasiswa</h1>";
});
Route::get('/admin/dosen', function () {
    return "<h1>Daftar Dosen</h1>";
});
Route::get('/admin/kaeryawan', function () {
    return "<h1>Daftar Karyawan</h1>";
});
/* dengan tambahan Route::prefix() */
Route::prefix('/admin'->group(function) {
    Route::get('/admin/mahasiswa', function () {
        echo "<h1>Daftar Mahasiswa</h1>";
    });
    Route::get('/admin/dosen', function () {
        echo "<h1>Daftar Dosen</h1>";
    });
    Route::get('/admin/karyawan', function () {
        echo "<h1>Daftar Karyawan</h1>";
    });
});

/* 5.9 Route Fallback */
Route::Fallback(function () {
    return "Sorry, We can't found";
});

/* 5.10 Route Priority */
Route::get('/buku/1', function () {
    return "Buku ke-1";
});
Route::get('/buku/1', function () {
    return "Buku ke-1";
});
Route::get('/buku/1', function () {
    return "Buku ke-1";
});

/* ketika menggunakan route parameter hasilnya berbeda */

Route::get('/buku/{a}', function ($a) {
    return "Buku ke-$a";
});
Route::get('/buku/{b}', function ($b) {
    return "Buku ke-$b";
});
Route::get('/buku/{c}', function ($c) {
    return "Buku ke-$c";
});

