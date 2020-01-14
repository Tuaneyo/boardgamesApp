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

Route::get('/', function () {
    return view('index');
})->name('homie');

Auth::routes(['verify' => true]);

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.show');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.show');

// Check if any user is loged in
Route::group(['middleware' => 'auth'], function(){
    Route::get('/user/manage', 'UserController@manage')->name('user.manage');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::post('/account/update', 'AccountController@update')->name('account.post');
    // user is loged in
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user/games', 'UserController@index')->name('user.games');

    // routes games
    Route::get('/games', 'GamesController@index')->name('games');
    Route::get('/games/create', 'GamesController@create')->name('games.create.show');
    Route::get('/games/edit/{id}', 'GamesController@edit')->name('games.edit');
    Route::get('/games/show/{id}', 'GamesController@show')->name('games.show');

    // post games
    Route::post('/games/create', 'GamesController@store')->name('games.create.post');
    Route::post('/games/update/{id}', 'GamesController@update')->name('games.update');
    Route::post('/games/destroy/{id}', 'GamesController@destroy')->name('games.destroy');

    // routes leaderboard
    Route::get('/boards', 'LeaderboardController@index')->name('boards');


    Route::resource('/account', 'AccountController', [
        'names' => [
            'index' => 'account'
        ]
    ]);

    Route::post('/rate', 'RatingController@postRate')->name('rate.post');

    // comment route
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/reply/store', 'CommentController@replied')->name('reply.add');

    // Battles route
    Route::get('/battles', 'BattlesController@index')->name('battles');
    Route::get('/battles/create-step1', 'BattlesController@createStep1')->name('battles.create-step1');
    Route::post('/battles/create-step1', 'BattlesController@postCreateStep1')->name('battles.post.create-step1');

    Route::get('/battles/create-step2', 'BattlesController@createStep2')->name('battles.create-step2');
    Route::post('/battles/create-step2', 'BattlesController@postCreateStep2')->name('battles.post.create-step2');

    Route::get('/battles/create-step3', 'BattlesController@createStep3')->name('battles.create-step3');
    Route::post('/battles/create-step3', 'BattlesController@postCreateStep3')->name('battles.post.create-step3');

    Route::get('/battles/create-step4', 'BattlesController@createStep4')->name('battles.create-step4');
    Route::post('/battles/create-step4', 'BattlesController@postCreateStep4')->name('battles.post.create-step4');

    Route::get('/battles/show/{id}', 'BattlesController@show')->name('battles.show');
    Route::get('/battles/edit/{id}', 'BattlesController@edit')->name('battles.edit');


    Route::post('/battles/destroy/{id}', 'BattlesController@destroy')->name('battles.destroy');

    Route::post('/battles/update/{id}', 'BattlesController@update')->name('battles.update');
    // Access for only the admin
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin/manage', 'AdminController@manage')->name('admin.manage');
        Route::get('/account/{id}', 'AdminController@show')->name('account.user');
    });
});

// test environment

Route::get("/sparkpost", function () {
    Mail::send("emails.test", [], function ($message) {
        $message
            ->from("info@bounces.tuannet.nl", "Tuan NGuyen")
      ->to("tuan11@hotmail.com", "Receiver Name")
      ->subject("From SparkPost with ❤");
  });

  return redirect('/');
});


Route::get('/test', function(){
    return view('layouts.dashboard');
});
