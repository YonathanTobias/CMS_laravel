<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProgramStudiController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\SpmiController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SlideController;

/*
|--------------------------------------------------------------------------
| Web Routes - Portal Publik STIKes Panti Waluya Malang
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/program-studi', [PublicController::class, 'prodiIndex'])->name('prodi.index');
Route::get('/program-studi/{slug}', [PublicController::class, 'prodiShow'])->name('prodi.show');
Route::get('/berita', [PublicController::class, 'newsIndex'])->name('news.index');
Route::get('/berita/{slug}', [PublicController::class, 'newsShow'])->name('news.show');
Route::get('/spmi', [PublicController::class, 'spmiIndex'])->name('spmi.index');
Route::get('/fasilitas', [PublicController::class, 'facilitiesIndex'])->name('facilities.index');
Route::get('/halaman/{slug}', [PublicController::class, 'pageShow'])->name('pages.show');
Route::get('/kontak', [PublicController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin CMS Routes (Gaya WordPress)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Posts / Berita
    Route::resource('posts', PostController::class);
    
    // CRUD Pages / Halaman
    Route::resource('pages', PageController::class);
    
    // CRUD Program Studi
    Route::resource('prodi', ProgramStudiController::class);
    
    // CRUD Fasilitas Kampus
    Route::resource('facilities', FacilityController::class);
    
    // CRUD SPMI & Dokumen Akreditasi
    Route::resource('spmi', SpmiController::class);
    
    // CRUD Menus & Sub-menus (Gaya WordPress Menus)
    Route::resource('menus', MenuController::class);
    
    // CRUD Banner Carousel Slides
    Route::resource('slides', SlideController::class);
    
    // Site Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
