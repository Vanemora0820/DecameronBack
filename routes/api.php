<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\RoomAssignmentController;


Route::resource('hotels', HotelController::class);
Route::resource('room_types', RoomTypeController::class);
Route::resource('accommodations', AccommodationController::class);
Route::resource('room_assignments', RoomAssignmentController::class);
