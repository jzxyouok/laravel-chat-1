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

Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);


Route::get('login',['as' => 'login', function () {

	if (isset($_COOKIE['remember_me_cookie']) && Auth::user() != "") 
	{   
		return Redirect::to('backend/dashboard');  
	}
	else
	{
		return View('frontend.login');
	}

}]);

Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::post('login/auth', ['as' => 'login/auth', 'uses' => 'LoginController@auth']);

Route::group(array('middleware' => 'auth'), function()
{
	Route::group(['namespace' => 'Backend'], function()
	{
		Route::group(['prefix' => 'backend'], function () {

			Route::get('dashboard', ['as' => 'backend/dashboard', 'uses' => 'DashboardController@index']);

		});
	});
});
