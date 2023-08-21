<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');

Route::post('/checkout/{id}', [CheckoutController::class, 'process'])->name('checkout.process')->middleware('auth');
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('auth');
Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])->name('checkout.remove')->middleware('auth');
Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout.user');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/process-register', [RegisterController::class, 'process_register'])->name('process.register');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix('/admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

        Route::resource('/travel-package', TravelPackageController::class);
        Route::resource('/gallery', GalleryController::class);
        Route::resource('/transaction', TransactionController::class);
    });
});
