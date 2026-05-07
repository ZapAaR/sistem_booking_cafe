<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuCategorieController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (Auth::check()){
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('rolecheck:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        /* Menu Kategori */
        Route::get('/kategori', [MenuCategorieController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [MenuCategorieController::class, 'create'])->name('kategori.create');
        Route::post('/kategori', [MenuCategorieController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/edit/{menu_categorie:slug}', [MenuCategorieController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{menu_categorie:slug}', [MenuCategorieController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{menu_categorie:slug}', [MenuCategorieController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/kategori/{menu_categorie:slug}', [MenuCategorieController::class, 'show'])->name('kategori.show');
        Route::get('/kategori/export/csv', [MenuCategorieController::class, 'exportCsv'])->name('kategori.export.csv');
        Route::get('/kategori/export/pdf', [MenuCategorieController::class, 'exportPdf'])->name('kategori.export.pdf');

        /* Menu */
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/menu/edit/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
        Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
        Route::get('/menu/export/csv', [MenuController::class, 'exportCsv'])->name('menu.export.csv');
        Route::get('/menu/export/pdf', [MenuController::class, 'exportPdf'])->name('menu.export.pdf');

        /* Meja */
        Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');
        Route::get('/meja/create', [MejaController::class, 'create'])->name('meja.create');
        Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');
        Route::get('/meja/edit/{meja}', [MejaController::class, 'edit'])->name('meja.edit');
        Route::put('/meja/{meja}', [MejaController::class, 'update'])->name('meja.update');
        Route::delete('/meja/{meja}', [MejaController::class, 'destroy'])->name('meja.destroy');
        Route::get('/meja/{meja}', [MejaController::class, 'show'])->name('meja.show');
        Route::patch('/meja/toggle/{meja}', [MejaController::class, 'toggle'])->name('meja.toggle');
        Route::get('/meja/export/pdf', [MejaController::class, 'exportPdf'])->name('meja.export.pdf');
        Route::get('/meja/export/csv', [MejaController::class, 'exportCsv'])->name('meja.export.csv');
    });

    Route::middleware('rolecheck:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
