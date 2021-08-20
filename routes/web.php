<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\ZoneController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\HotelController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\TermController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('.login-page');
    Route::post('/login', [LoginController::class, 'login'])->name('.login');

    // Need Auth
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('.index');
        Route::get('/logout', [LoginController::class, 'logout'])->name('.logout');

        // Partner
        Route::get('/partner', [PartnerController::class, 'index'])->name('.partner');
        Route::get('/partner/edit', [PartnerController::class, 'edit'])->name('.partner.edit');
        Route::get('/partner/delete', [PartnerController::class, 'delete'])->name('.partner.delete');
        Route::post('/partner/save', [PartnerController::class, 'save'])->name('.partner.save');

        // Zone
        Route::get('/zone', [ZoneController::class, 'index'])->name('.zone');
        Route::get('/zone/edit', [ZoneController::class, 'edit'])->name('.zone.edit');
        Route::post('/zone/save', [ZoneController::class, 'save'])->name('.zone.save');
        Route::get('/zone/delete', [ZoneController::class, 'delete'])->name('.zone.delete');

        // Location
        Route::get('/location/edit', [LocationController::class, 'edit'])->name('.location.edit');
        Route::post('/location/save', [LocationController::class, 'save'])->name('.location.save');
        Route::get('/location/delete', [LocationController::class, 'delete'])->name('.location.delete');

        // Hotel
        Route::get('/hotel', [HotelController::class, 'index'])->name('.hotel');
        Route::get('/hotel/edit', [HotelController::class, 'edit'])->name('.hotel.edit');
        Route::get('/hotel/delete', [HotelController::class, 'delete'])->name('.hotel.delete');
        Route::post('/hotel/save', [HotelController::class, 'save'])->name('.hotel.save');


        // Term
        Route::get('/term/edit', [TermController::class, 'edit'])->name('.term.edit');
        Route::post('/term/save', [TermController::class, 'save'])->name('.term.save');
        Route::get('/term/delete', [TermController::class, 'delete'])->name('.term.delete');

        // Room
        Route::get('/room/edit', [RoomController::class, 'edit'])->name('.room.edit');
        Route::post('/room/save', [RoomController::class, 'save'])->name('.room.save');
        Route::get('/room/delete', [RoomController::class, 'delete'])->name('.room.delete');
        Route::get('/room/prcedit', [RoomController::class, 'prcedit'])->name('.room.prcedit');
        Route::post('/room/prcsave', [RoomController::class, 'prcsave'])->name('.room.prcsave');
        Route::get('/room/show', [RoomController::class, 'show'])->name('.room.show');
    });
});

Route::name('site')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return 'website';
        });
    });

    Route::get('/login', function () {
    })->name('.login-page');
});
