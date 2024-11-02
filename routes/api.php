<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/signup', [UserController::class, 'create_admin']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/room', [RoomController::class, 'store']);
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::delete('/room/{room}', [RoomController::class, 'destroy']);
    Route::post('/register', [UserController::class, 'store']);
    Route::patch('/userdata/{user}', [UserController::class, 'update']);
    Route::delete('/userdata/{user}', [UserController::class, 'destroy']);
    Route::get('/room/{room}/userdata/{user}', [UserController::class, 'change_room']);
    Route::get('/usersinroom', [RoomController::class, 'usersinroom']);
    Route::post('/hotel', [HotelController::class, 'store']);
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::delete('/hotel/{hotel}', [HotelController::class, 'destroy']);
    Route::get('/hotel/{hotel}/room/{room}', [HotelController::class, 'add_room']);
    Route::get('/roomsinhotels', [HotelController::class, 'roomsinhotels']);

});