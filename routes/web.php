<?php

use Illuminate\Support\Facades\Route;

// MAIN WEB
use App\Http\Controllers\IndexController;

// LOGIN
use App\Http\Controllers\LoginController;

// ORDER
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderTableController;

// MASTER DATA
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OutletController;

// WEB CONTENT
use App\Http\Controllers\TopbarController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;

// USER
use App\Http\Controllers\UserController;

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

// INDEX PAGE
Route::get('/', [IndexController::class, 'index']);
Route::post('/', [IndexController::class, 'store']);

// ADMIN LOGIN
Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::post('/admin/logout', [LoginController::class, 'logout']);

// ADMIN 
Route::get('/admin', [IndexController::class, 'admin'])->middleware('auth');

// ADMIN ORDER
Route::get('/admin/order/list', [OrderController::class, 'list'])->middleware('staf');
Route::get('/admin/order/progress', [OrderController::class, 'progress'])->middleware('staf');
Route::get('/admin/order/ready', [OrderController::class, 'ready'])->middleware('staf');
Route::get('/admin/order/done', [OrderController::class, 'done'])->middleware('auth');
Route::get('/admin/order/cancel', [OrderController::class, 'cancel'])->middleware('auth');

Route::resource('/admin/order', OrderController::class)->except('destroy')->middleware('auth');

// ADMIN MASTER DATA
Route::resource('/admin/member', MemberController::class)->middleware('auth');
Route::resource('/admin/barang', BarangController::class)->middleware('owner');
Route::resource('/admin/discount', DiscountController::class)->middleware('owner');
Route::resource('/admin/outlet', OutletController::class)->middleware('owner');

// ADMIN WEB CONTENT
Route::resource('/admin/topbar', TopbarController::class)->middleware('admin')->except('create', 'store', 'show', 'edit', 'destroy');
Route::resource('/admin/hero', HeroController::class)->middleware('admin')->except('create', 'store', 'show', 'edit', 'destroy');
Route::resource('/admin/about', AboutController::class)->middleware('admin')->except('create', 'store', 'show', 'edit', 'destroy');
Route::resource('/admin/testimoni', TestimoniController::class)->middleware('admin');
Route::resource('/admin/contact', ContactController::class)->middleware('admin')->except('create', 'store', 'show', 'edit', 'destroy');
Route::resource('/admin/message', MessageController::class)->middleware('admin')->except('create', 'store', 'edit', 'update');

// ADMIN USER
Route::resource('/admin/user', UserController::class)->middleware('owner');