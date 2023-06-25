<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminBranch;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminGallery;
use App\Http\Controllers\Admin\AdminNews;
use App\Http\Controllers\Admin\AdminTestimonial;
use App\Http\Controllers\Admin\AdminUser;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/galeri', [HomeController::class, 'gallery']);
Route::get('/kontak', [HomeController::class, 'contact']);
Route::get('/program-pelatihan', [HomeController::class, 'training']);
Route::get('/berita', [HomeController::class, 'news']);
Route::get('/berita/{news:id}', [HomeController::class, 'new']);

// ADMIN AUTH
Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/logout', [AuthController::class, 'logout']);

// ADMIN PAGE
Route::group(['prefix'=> 'admin','middleware'=>['auth']], function(){
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/branch', [AdminBranch::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/gallery', [AdminGallery::class, 'index']);
    Route::get('/news', [AdminNews::class, 'index']);
    Route::get('/testimonial', [AdminTestimonial::class, 'index']);
    Route::get('/user', [AdminUser::class, 'index']);
    Route::get('/profile', [AdminUser::class, 'profile']);

    Route::post('/branch', [AdminBranch::class, 'postHandler']);
    Route::post('/gallery', [AdminGallery::class, 'postHandler']);
    Route::post('/news', [AdminNews::class, 'postHandler']);
    Route::post('/testimonial', [AdminTestimonial::class, 'postHandler']);
    Route::post('/user', [AdminUser::class, 'postHandler']);
    Route::post('/profile', [AdminUser::class, 'postHandler']);
});

// API
Route::group(['prefix'=> 'api'], function(){
    Route::get('branch/{branch:id}', [APIController::class, 'Branch']);
    Route::get('gallery/{gallery:id}', [APIController::class, 'Gallery']);
    Route::get('news/{news:id}', [APIController::class, 'News']);
    Route::get('testimonial/{testimonial:id}', [APIController::class, 'Testimonial']);
    Route::get('user/{user:id}', [APIController::class, 'User']);
});