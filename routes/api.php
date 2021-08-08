<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIController;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('app_register', [APIController::class, 'app_register']);
Route::post('app_login', [APIController::class, 'app_login']);
Route::post('app_forgot_email', [APIController::class, 'app_forgot_email']);
Route::post('app_program_list', [APIController::class, 'app_program_list']);
Route::post('app_playlist_list', [APIController::class, 'app_playlist_list']);
Route::post('app_video_list', [APIController::class, 'app_video_list']);
Route::post('app_buy_now_list', [APIController::class, 'app_buy_now_list']);
Route::post('app_total_time_add', [APIController::class, 'app_total_time_add']);
Route::post('app_feed_back_add', [APIController::class, 'app_feed_back_add']);