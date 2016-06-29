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

Route::get('/',['as' => 'login', function () {

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



Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@index']);

Route::post('register/submit', ['as' => 'register/submit', 'uses' => 'RegisterController@submit']);

Route::get('request_mail', ['as' => 'request_mail', 'uses' => 'RegisterController@request_mail']);

Route::post('resend', ['as' => 'resend', 'uses' => 'RegisterController@resend']);

Route::get('register/activate/{id}', ['as' => 'register/activate', 'uses' => 'RegisterController@activate']);


Route::group(array('middleware' => 'auth'), function()
{
	Route::group(['namespace' => 'Backend'], function()
	{
		Route::group(['prefix' => 'backend'], function () {

			Route::get('dashboard', ['as' => 'backend/dashboard', 'uses' => 'DashboardController@index']);
			Route::get('public_data', ['as' => 'backend/public_data', 'uses' => 'DashboardController@public_data']);

		});
	});
});
