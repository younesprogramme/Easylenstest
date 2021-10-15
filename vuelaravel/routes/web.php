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

Route::get('/', function () {
    return view('welcome');
});
Route::get('form', 'UserController@form');
Route::any('{slug}', function () {
    return view('welcome');
});
Route::post('login', 'UserController@login');
Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from hilaliyounes',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('hilaliyounes.dev@gmail.com')->send(new \App\Mail\MyTestMail);
   
    dd("Email is Sent.");
});
