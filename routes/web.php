<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuCategorieController;
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

        Route::get('/kategori', [MenuCategorieController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [MenuCategorieController::class, 'create'])->name('kategori.create');
        Route::post('/kategori', [MenuCategorieController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/edit/{menu_categorie:slug}', [MenuCategorieController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{menu_categorie:slug}', [MenuCategorieController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{menu_categorie:slug}', [MenuCategorieController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/kategori/{menu_categorie:slug}', [MenuCategorieController::class, 'show'])->name('kategori.show');
        Route::get('/kategori/export/csv', [MenuCategorieController::class, 'exportCsv'])->name('kategori.export.csv');
        Route::get('/kategori/export/pdf', [MenuCategorieController::class, 'exportPdf'])->name('kategori.export.pdf');
    });

    Route::middleware('rolecheck:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
