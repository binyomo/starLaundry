<?php

use Illuminate\Support\Facades\Route;

// MAIN WEB
use App\Http\Controllers\IndexController;

// ORDER
use App\Http\Controllers\OrderController;

// MASTER DATA
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OutletController;

// WEB CONTENT
use App\Http\Controllers\WebContentController;
use App\Http\Controllers\TestimoniController;

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
Route::get('/admin/login', [IndexController::class, 'login'])->name('login')->middleware('guest');
Route::post('/admin/login', [IndexController::class, 'authenticate']);
Route::post('/admin/logout', [IndexController::class, 'logout']);



/*
|--------------------------------------------------------------------------
| MIDDLEWARE AUTH
|--------------------------------------------------------------------------
*/ 
Route::group(['middleware' => ['auth']], function () {
	Route::get('/admin', [IndexController::class, 'admin']);

	// ADMIN ORDER
	Route::resource('/admin/order', OrderController::class)->except('destroy');
	Route::get('/admin/order/done', [OrderController::class, 'done']);
	Route::get('/admin/order/cancel', [OrderController::class, 'cancel']);

	// ADMIN MASTER DATA
	Route::resource('/admin/member', MemberController::class);
});



/*
|--------------------------------------------------------------------------
| MIDDLEWARE STAF
|--------------------------------------------------------------------------
*/ 
Route::group(['middleware' => ['staf']], function () {
	// ADMIN ORDER
	Route::get('/admin/order/list', [OrderController::class, 'list']);
	Route::get('/admin/order/progress', [OrderController::class, 'progress']);
	Route::get('/admin/order/ready', [OrderController::class, 'ready']);	
});



/*
|--------------------------------------------------------------------------
| MIDDLEWARE OWNER
|--------------------------------------------------------------------------
*/ 
Route::group(['middleware' => ['owner']], function () {
	// ADMIN MASTER DATA
	Route::resource('/admin/barang', BarangController::class);
	Route::resource('/admin/discount', DiscountController::class);
	Route::resource('/admin/outlet', OutletController::class);

	// ADMIN USER
	Route::resource('/admin/user', UserController::class)->middleware('owner');
});



/*
|--------------------------------------------------------------------------
| MIDDLEWARE ADMIN
|--------------------------------------------------------------------------
*/ 
Route::group(['middleware' => ['admin']], function () {
	// TOPBAR
	Route::get('/admin/topbar', [WebContentController::class, 'indexTopbar']);
	Route::put('/admin/topbar/{id}', [WebContentController::class, 'updateTopbar']);

	// HERO
	Route::get('/admin/hero', [WebContentController::class, 'indexHero']);
	Route::put('/admin/hero/{id}', [WebContentController::class, 'updateHero']);

	// ABOUT
	Route::get('/admin/about', [WebContentController::class, 'indexAbout']);
	Route::put('/admin/about/{id}', [WebContentController::class, 'updateAbout']);

	// TESTIMONI
	Route::resource('/admin/testimoni', TestimoniController::class);

	// CONTACT
	Route::get('/admin/contact', [WebContentController::class, 'indexContact']);
	Route::put('/admin/contact/{id}', [WebContentController::class, 'updateContact']);

	// MESSAGE
	Route::get('/admin/message', [WebContentController::class, 'indexMessage']);
	Route::get('/admin/message/{id}', [WebContentController::class, 'showMessage']);
	Route::delete('/admin/message/{id}', [WebContentController::class, 'destroyMessage']);

});

