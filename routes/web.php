<?php

use Illuminate\Support\Facades\Mail;
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

/**
 *  sent notification
 */
Route::get('/sendNotification',function (){
    $user=\App\Models\User::find(1);
    $data=['name'=>$user->name, 'bodyData'=>'Thanks for using our application'];
    Mail::send('mail',$data,function ($msg) use ($user){
        $msg->to($user->email);
        $msg->subject('POS App');
    });
});
