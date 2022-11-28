<?php

use App\Http\Controllers\Admin\Blog\CreatePost;
use App\Http\Controllers\Admin\Blog\DetailPost;
use App\Http\Controllers\Admin\Blog\EditPost;
use App\Http\Controllers\Admin\Blog\Main as AdminBlogMain;
use App\Http\Controllers\Admin\MailNotifier\Index as AdminMailNotifierIndex;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Blog\B_Main;
use App\Http\Controllers\Blog\B_Read;
use App\Http\Controllers\Main\Main;
use App\Http\Controllers\Other\Redirect;
use App\Http\Controllers\Admin\Main as AdminMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

// Public Vistor Counter 
Route::group(['middleware' => 'incrementVisitor'], function () {
  // Main Website
  Route::get('/', [Main::class, 'index'])->name('Main');

  // Blog
  Route::group(['prefix' => '/blog'], function () {
    Route::get('/', [B_Main::class, 'under_construction'])->name('Blog_index');

    Route::get('{date}/{slug}/{code}', [B_Read::class, 'read'])->name('Blog_read');
    Route::get('{code}', [B_Read::class, 'r'])->name('Blog_read_short');

    Route::get('tag/{slug}', function ($slug) {
      return $slug;
    })->name('Blog_tag');
  });

  // Other
  Route::get('/download_cv', [Redirect::class, 'Main_download_cv'])->name('Main_download_cv');
  Route::get('/author/{username}', function ($username) {
    return $username;
  })->name('author_profile');
});

// Auth
Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function () {
  Route::get('login', [Login::class, 'form'])->name('Auth_login');
  Route::post('login', [Login::class, 'process'])->name('Auth_process');
});
Route::any('/auth/logout', [Logout::class, 'logout'])->name('Auth_logout');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
  Route::get('/', [AdminMain::class, 'dashboard'])->name('Admin_index');

  // Blog
  Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [AdminBlogMain::class, 'index'])->name('Admin_blog_index');

    Route::get('create', [CreatePost::class, 'form'])->name('Admin_blog_create');
    Route::post('create', [CreatePost::class, 'create']);

    Route::get('detail/{code}', [DetailPost::class, 'detail'])->name('Admin_blog_detail');

    Route::get('edit/{code}', [EditPost::class, 'edit'])->name('Admin_blog_edit');
  });

  Route::group(['prefix' => 'mail-notifier'], function () {
    Route::get('/', [AdminMailNotifierIndex::class, 'index'])->name('Admin_mail_notifier_index');
  });
});