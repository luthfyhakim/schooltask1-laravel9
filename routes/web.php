<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home', [
        'name' => 'Hakim',
        'title' => 'Home',
        'blog' => Post::getAll()
    ]);
});

Route::get('/berita', [PostController::class, 'index']);

Route::get('post/{slug}', function ($slug) {
    return view('berita.post', [
        'title' => 'Single Post',
        'post' => Post::getBySlug($slug)
    ]);
});

Route::get('/agenda', function () {
    return view('agenda.index', [
        'title' => 'Agenda'
    ]);
});

Route::get('/profil', function () {
    return view('profil.index', [
        'title' => 'Profil',
        'name' => 'Luthfy Hakim',
        'email' => 'luthfyhakim250404@gmail.com'
    ]);
});

// route keahlian
Route::prefix('keahlian')->group(function () {
    // rpl
    Route::get('/rpl', function () {
        return view('keahlian.rpl.index');
    })->name('rpl');

    // dpib
    Route::get('/dpib', function () {
        return view('keahlian.dpib.index');
    })->name('dpib');

    // tkp
    Route::get('/tkp', function () {
        return view('keahlian.tkp.index');
    })->name('tkp');

    // boga
    Route::get('/boga', function () {
        return view('keahlian.boga.index');
    })->name('boga');

    // kuliner
    Route::get('/kuliner', function () {
        return view('keahlian.kuliner.index');
    })->name('kuliner');

    // tptu
    Route::get('/tptu', function () {
        return view('keahlian.tptu.index');
    })->name('tptu');

    // tp
    Route::get('/tp', function () {
        return view('keahlian.tp.index');
    })->name('tp');
});

// route siswa
Route::controller(StudentController::class)->group(function () {
    Route::get('/siswa', 'index')->name('siswa');
    Route::get('/siswa/tambah', 'tambah')->name('siswa.tambah');
    Route::post('/siswa/simpan', 'simpan');
    Route::get('/siswa/edit/{id}', 'edit')->name('siswa.edit');
    Route::put('/siswa/update/{id}', 'update');
    Route::get('/siswa/hapus/{id}', 'delete')->name('siswa.hapus');
});

// route guru
Route::controller(GuruController::class)->group(function () {
    Route::get('/guru', 'index')->name('guru');
    Route::get('/guru/create', 'create')->name('guru.create');
    Route::post('/guru/store', 'store');
    Route::get('/guru/edit/{id}', 'edit')->name('guru.edit');
    Route::put('/guru/update/{id}', 'update');
    Route::get('/guru/delete/{id}', 'delete')->name('guru.delete');
});

// route loker
// Route::resource('loker', LokerController::class);
Route::controller(LokerController::class)->group(function () {
    Route::get('/loker', 'index')->name('loker');
    Route::get('/loker/create', 'create')->name('loker.create');
    Route::post('/loker/store', 'store');
    Route::get('/loker/show/{id}', 'show')->name('loker.detail');
    Route::get('/loker/edit/{id}', 'edit')->name('loker.edit');
    Route::put('/loker/update/{id}', 'update');
    Route::get('/loker/delete/{id}', 'delete')->name('loker.delete');
});

// route login
Route::get('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// route register
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

// route logout
Route::post('/logout', [LoginController::class, 'logout']);

// dashboard user
Route::get('/home', function () {
    return view('dashboard.home');
});
