<?php

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
use App\Events\TaskEvent;
use App\Events\MessagePosted;
use App\Message;
Route::get('/', function () {
//     Nexmo::message()->send([
//     'to'   => '923239557040',
//     'from' => '923239557040',
//     'text' => 'Hello This is a new notification'
// ]);
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () { 
Route::get('/event', function () {
    event(new TaskEvent(Auth::user()));
});
Route::get('/listen', function () {
    return view('listenBroadcast');
});

Route::get('chat', function(){
	return view('chat');
});

Route::get('messages', function(){
	return App\Message::with('user')->get();
});

Route::post('/postmessages', function(){
	$user = Auth::user();
    
    $message = $user->messages()->create([
    	'message' => request()->get('message')
    ]);
    broadcast(new MessagePosted($message,$user))->toOthers();
	return ['status' => 'ok'];
});


});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/all', 'PostController@home');
Route::get('/allp', 'ProductController@home');
Route::resource('/posts','PostController');
Route::get('/vuetest', function(){
    return view('Vuetesting');
});
Route::resource('/products','ProductController');

