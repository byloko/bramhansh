<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrganizationContactController;
//frontend start
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
//frontend end

//backend start
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\PlaylistController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\BuyNowController;
use App\Http\Controllers\Backend\MyAccountController;
use App\Http\Controllers\Backend\FeedBackController;
use App\Http\Controllers\Backend\TotalTimeController;
//backend end

//frontend start
	Route::prefix('')->group(function () {
		Route::get('', [HomeController::class, 'home']);
	});

	Route::prefix('organization_details')->group(function () {

	Route::post('', [OrganizationContactController::class, 'create']);

	});

	Route::prefix('admin')->group(function () {
		Route::get('login', [AuthController::class, 'login']);
		Route::post('login', [AuthController::class, 'post_login']);
		Route::get('logout', [AuthController::class, 'logout']);
 	});
//frontend end

// backend start
Route::group(['middleware' => 'admin'], function(){
	//dashboard start
	Route::prefix('admin/dashboard')->group(function () {
		Route::get('', [DashboardController::class, 'dashboard_index']);
	});
	//dashboard end

	//user start
	Route::prefix('admin/user')->group(function () {
		Route::get('', [UserController::class, 'user_index']);
		Route::get('add', [UserController::class, 'user_create']);
		Route::post('add', [UserController::class, 'user_store']);
		Route::get('edit/{id}', [UserController::class, 'user_edit']);
		Route::post('edit/{id}', [UserController::class, 'user_update']);
		Route::get('delete/{id}', [UserController::class, 'user_destroy']);
		Route::get('view/{id}', [UserController::class, 'user_view']);
	});
	//user end

	//program start
	Route::prefix('admin/program')->group(function () {
		Route::get('', [ProgramController::class, 'program_index']);
		Route::get('add', [ProgramController::class, 'program_create']);
		Route::post('add', [ProgramController::class, 'program_store']);
		Route::get('view/{id}', [ProgramController::class, 'program_show']);
		Route::get('edit/{id}', [ProgramController::class, 'program_edit']);
		Route::post('edit/{id}', [ProgramController::class, 'program_update']);
		Route::get('delete/{id}', [ProgramController::class, 'program_destroy']);
		Route::get('option_delete/{id}', [ProgramController::class, 'option_delete']);
	});
	//program end

	//playlist start
	Route::prefix('admin/playlist')->group(function () {
		Route::get('', [PlaylistController::class, 'playlist_index']);
		Route::get('add', [PlaylistController::class, 'playlist_create']);
		Route::post('add', [PlaylistController::class, 'playlist_store']);
		Route::get('edit/{id}', [PlaylistController::class, 'playlist_edit']);
		Route::post('edit/{id}', [PlaylistController::class, 'playlist_update']);
		Route::get('delete/{id}', [PlaylistController::class, 'playlist_destroy']);
	});
	//playlist end

	//video start
	Route::prefix('admin/video')->group(function () {
		Route::get('', [VideoController::class, 'video_index']);
		Route::get('add', [VideoController::class, 'video_create']);
		Route::post('add', [VideoController::class, 'video_store']);
		Route::get('edit/{id}', [VideoController::class, 'video_edit']);
		Route::post('edit/{id}', [VideoController::class, 'video_update']);
		Route::get('delete/{id}', [VideoController::class, 'video_destroy']);
		Route::post('get_play_list_dropdown', [VideoController::class, 'get_play_list_dropdown']);
	});
	//video end

	//buy_now start
	Route::prefix('admin')->group(function () {
		Route::get('changeStatus', [BuyNowController::class, 'changeStatus']);
		Route::get('buy_now', [BuyNowController::class, 'buy_now_index']);
		Route::get('buy_now/delete/{id}', [BuyNowController::class, 'buy_now_destroy']);
	});
	//buy_now end

	//myaccount start
	Route::prefix('admin/myaccount')->group(function () {
		Route::get('', [MyAccountController::class, 'my_account_index']);
		Route::post('add', [MyAccountController::class, 'my_account_update']);
	});
	//myaccount end

	//myaccount start
	Route::prefix('admin/feed_back')->group(function () {
		Route::get('', [FeedBackController::class, 'feed_back_index']);
		Route::get('delete/{id}', [FeedBackController::class, 'feed_back_destroy']);
	});
	//myaccount end

	//total_time start
	Route::prefix('admin/total_time')->group(function () {
		Route::get('', [TotalTimeController::class, 'total_time_index']);
		Route::get('delete/{id}', [TotalTimeController::class, 'total_time_destroy']);
	});
	//total_time end

});
// backend end
