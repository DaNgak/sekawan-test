<?php

use App\Http\Controllers\BossIndexController;
use App\Http\Controllers\BossViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverIndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderTransportBossController;
use App\Http\Controllers\OrderTransportController;
use App\Http\Controllers\OrderTransportFinishController;
use App\Http\Controllers\TransportController;
use App\Models\OrderTransport;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post('/login', [LoginController::class, "store"])->name("login.store");


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name("dashboard.index");
    Route::get('/logout', [LoginController::class, "logout"])->name("logout");
    Route::get('/dashboard/finish', [OrderTransportFinishController::class, 'index'])->name('order.finish.index');
    Route::get('/dashboard/finish/{id}', [OrderTransportFinishController::class, 'show'])->name('order.finish.show');
    Route::get('/dashboard/driver', DriverIndexController::class)->name('driver.index');
    Route::get('/dashboard/boss', BossIndexController::class)->name('boss.index');
    Route::get('/dashboard/transport/export', [TransportController::class, 'export'])->name('transport.export');

    Route::middleware(['boss'])->group(function () {
        Route::put('/dashboard/order/confirm-boss/{id}', [OrderTransportController::class, 'confirmBoss'])->name('order.confirm.boss');
        Route::get('/dashboard/order/boss-index', [BossViewController::class, 'orderIndex'])->name('order.boss.index');
        Route::get('/dashboard/order/boss-show/{id}', [BossViewController::class, 'orderShow'])->name('order.boss.show');
        Route::get('/dashboard/transport/boss-index', [BossViewController::class, 'transportIndex'])->name('transport.boss.index');
});
    
    Route::middleware(['admin'])->group(function () {
        Route::resource('/dashboard/transport', TransportController::class);
        Route::resource('/dashboard/order', OrderTransportController::class)->except(['destroy']);
        Route::put('/dashboard/order/confirm-admin/{id}', [OrderTransportController::class, 'confirmAdmin'])->name('order.confirm.admin');
        Route::put('/dashboard/order/confirm-finish-admin/{id}', [OrderTransportController::class, 'confirmFinish'])->name('order.confirm.finish');
        Route::delete('/dashboard/finish/{id}', [OrderTransportFinishController::class, 'destroy'])->name('order.finish.destroy');
    });
});