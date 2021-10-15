<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getissues', 'IssueController@listissues');
Route::post('submitissue', 'IssueController@submitissue');
Route::post('updateissue', 'IssueController@updateissue');
Route::post('editissue', 'IssueController@editissue');
Route::post('admineditissue', 'IssueController@admineditissue');
Route::post('getissuedetail', 'IssueController@issuedetail');
Route::post('send-mail', function (Request $request) {

    $details = [
        'title' => $request->title,
        'body' => $request->body
    ];

    Mail::to('hilaliyounes.dev@gmail.com')->send(new \App\Mail\MyTestMail($details));

    return "Email is Sent.";
});
Route::post('admin-mail', function (Request $request) {

    $details = [
        'title' => 'Mail from admin',
        'body' => $request->status
    ];

    Mail::to('hilaliyounes.dev@gmail.com')->send(new \App\Mail\AdminMail($details));

    return "Email is Sent.";
});
