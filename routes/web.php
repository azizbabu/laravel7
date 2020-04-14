<?php

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
auth()->loginUsingId(1);
Route::get('/', function () {
    return view('welcome');
});

Route::get('reports', function() {
    return 'the secret reports';
})->middleware('can:view_reports');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('payments/create', 'PaymentController@create')->middleware('auth');
Route::post('payments', 'PaymentController@store')->middleware('auth');
Route::get('payments/test-event', 'PaymentController@testEvent')->middleware('auth');
Route::post('payments/process-event', 'PaymentController@processEvent')->middleware('auth');
Route::get('notifications', 'UserNotificationController@show')->middleware('auth');
Route::get('conversations', 'ConversationController@index');
Route::get('conversations/{conversation}', 'ConversationController@show')->middleware('can:view,conversation');

Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');
