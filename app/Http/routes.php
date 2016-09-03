<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('gift', 'RubricController@gift');

Route::get('swap', 'RubricController@swap');

Route::get('sale', 'RubricController@sale');

Route::get('location', 'RubricController@location');

Route::get('partners', 'RubricController@partners');

Route::post('getgift', 'ValidformController@getgift');

Route::post('getsale', 'ValidformController@getsale');

Route::post('getswap', 'ValidformController@getswap');

Route::post('getlocation', 'ValidformController@getlocation');

Route::post('getpartners', 'ValidformController@getpartners');

Route::get('/adgift/{id}', 'AdController@adgift');

Route::get('adsale/{id}', 'AdController@adsale');

Route::get('adswap/{id}', 'AdController@adswap');

Route::get('adlocation/{id}', 'AdController@adlocation');

Route::get('adpartners/{id}', 'AdController@adpartners');

Route::post('/editgift/{id}', 'ManagementController@editgift');

Route::post('editsale/{id}', 'ManagementController@editsale');

Route::post('editswap/{id}', 'ManagementController@editswap');

Route::post('editlocation/{id}', 'ManagementController@editlocation');

Route::post('editpartners/{id}', 'ManagementController@editpartners');

Route::get('/deletegift/{id}', 'ManagementController@deletegift');

Route::get('deletesale/{id}', 'ManagementController@deletesale');

Route::get('deleteswap/{id}', 'ManagementController@deleteswap');

Route::get('deletelocation/{id}', 'ManagementController@deletelocation');

Route::get('deletepartners/{id}', 'ManagementController@deletepartners');

Route::get('/search', 'ManagementController@search');
