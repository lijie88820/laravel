<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	echo '<pre>';
	$users = User::get()->all();
	var_dump($users);
	echo '</pre>';
	exit;
	return View::make('hello');
});

Route::resource('user', 'UserController');