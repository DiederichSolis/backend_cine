<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketSeatController;

Route::get('customers', [CustomerController::class, 'index']);
Route::get('customers/{id}', [CustomerController::class, 'show']);
Route::post('customers', [CustomerController::class, 'store']);
Route::put('customers/{id}', [CustomerController::class, 'update']);
Route::delete('customers/{id}', [CustomerController::class, 'destroy']);

Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/{id}', [MovieController::class, 'show']);
Route::post('movies', [MovieController::class, 'store']);
Route::put('movies/{id}', [MovieController::class, 'update']);
Route::delete('movies/{id}', [MovieController::class, 'destroy']);

Route::get('rooms', [RoomController::class, 'index']);
Route::get('rooms/{id}', [RoomController::class, 'show']);
Route::post('rooms', [RoomController::class, 'store']);
Route::put('rooms/{id}', [RoomController::class, 'update']);
Route::delete('rooms/{id}', [RoomController::class, 'destroy']); 
Route::get('/seats/room/{roomId}', [SeatController::class, 'findByRoomId']);//busaqueda por medio de roomid y asi asignar os asientos para la sala



Route::get('seats', [SeatController::class, 'index']);
Route::get('seats/{id}', [SeatController::class, 'show']);
Route::post('seats', [SeatController::class, 'store']);
Route::put('seats/{id}', [SeatController::class, 'update']);
Route::delete('seats/{id}', [SeatController::class, 'destroy']);

Route::get('showtimes', [ShowtimeController::class, 'index']);
Route::get('showtimes/{id}', [ShowtimeController::class, 'show']);
Route::post('showtimes', [ShowtimeController::class, 'store']);
Route::put('showtimes/{id}', [ShowtimeController::class, 'update']);
Route::delete('showtimes/{id}', [ShowtimeController::class, 'destroy']);
Route::get('/showtimes/movie/{movie_id}', [ShowtimeController::class, 'getByMovieId']);//mandato de infromacion por medio del id.movie

Route::get('tickets', [TicketController::class, 'index']);
Route::get('tickets/{id}', [TicketController::class, 'show']);
Route::post('tickets', [TicketController::class, 'store']);
Route::put('tickets/{id}', [TicketController::class, 'update']);
Route::delete('tickets/{id}', [TicketController::class, 'destroy']);

Route::get('ticket-seats', [TicketSeatController::class, 'index']);
Route::get('ticket-seats/{id}', [TicketSeatController::class, 'show']);
Route::post('ticket-seats', [TicketSeatController::class, 'store']);
Route::put('ticket-seats/{id}', [TicketSeatController::class, 'update']);
Route::delete('ticket-seats/{id}', [TicketSeatController::class, 'destroy']);


Route::get('/test', function () {
    return response()->json(['message' => 'API is working']); // prueba para verificar las rutas
});
