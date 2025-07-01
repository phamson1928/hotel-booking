<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\ContactController;

Route::get('/', [AdminController::class, 'home']);

Route::get('room_detail/{id}', [RoomController::class, 'showDetail'])->name('room_detail');

Route::post('book_room/{id}', [BookingController::class, 'booking'])->name('book_room');

Route::post('contact', [ContactController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('add_room', [AdminController::class, 'addRoom'])->name('add_room');

    Route::post('add_new_room', [RoomController::class, 'addNewRoom'])->name('add_new_room');

    Route::get('list_rooms', [RoomController::class, 'showListRoom'])->name('list_rooms');

    Route::get('home_in_panel', [AdminController::class, 'showHomePanel'])->name('home_in_panel');

    Route::get('room_delete/{id}', [RoomController::class, 'deleteRoom'])->name('room_delete');

    Route::get('room_update_screen/{id}', [RoomController::class, 'changeToUpdatePage'])->name('room_update_screen');

    Route::post('room_update/{id}', [RoomController::class, 'updateRoom'])->name('room_update');

    Route::get('list_bookings', [BookingController::class, 'showListBooking'])->name('list_bookings');

    Route::get('booking_delete/{id}', [BookingController::class, 'deleteBooking'])->name('booking_delete');

    Route::get('success_booking/{id}', [BookingController::class, 'successBooking'])->name('success_booking');

    Route::get('reject_booking/{id}', [BookingController::class, 'rejectBooking'])->name('reject_booking');

    Route::get('delete_room_image/{id}', [RoomController::class, 'deleteRoomImage'])->name('delete_room_image');

    Route::get('list_gallaries', [GallaryController::class, 'showListGallary'])->name('list_gallaries');

    Route::post('add_gallary', [GallaryController::class, 'addGallary'])->name('add_gallary');

    Route::get('delete_gallary/{id}', [GallaryController::class, 'deleteGallary'])->name('delete_gallary');

    Route::get('contact_delete/{id}', [ContactController::class, 'deleteContact'])->name('contact_delete');

    Route::post('send_response/{id}', [ContactController::class, 'sendMail'])->name('send_response');
});
