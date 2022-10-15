<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Blog\B_Main;
use App\Http\Controllers\Blog\B_Read;
use App\Http\Controllers\Main\Main;
use App\Http\Controllers\Other\Redirect;
use App\Http\Controllers\Admin\Main as AdminMain;
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

// Main Website
Route::get('/', [Main::class, 'index'])->middleware('incrementVistor')->name('Main');

// Blog
Route::group(['prefix' => '/blog'], function () {

  Route::get('/', [B_Main::class, 'index'])->name('Blog_index');

  Route::get('{date}/{title}/{code}', [B_Read::class, 'read'])->name('Blog_read');
});

// Auth
Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function () {
  Route::get('login', [Login::class, 'form'])->name('Auth_login');
  Route::post('login', [Login::class, 'process'])->name('Auth_process');
});
Route::any('/auth/logout', [Logout::class, 'logout']);

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
  Route::get('/', [AdminMain::class, 'dashboard'])->name('Admin_index');
});

// Other
Route::get('/download_cv', [Redirect::class, 'Main_download_cv'])->name('Main_download_cv');