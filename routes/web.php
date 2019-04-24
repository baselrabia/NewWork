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

Route::group(['namespace'=>'Auth'],function(){
	// guest Middleware with Auth namespace
	Route::group(['middleware'=>'guest'],function(){

		Route::get('/register', [
			'uses' => 'RegisterController@getRegister',
			'as' => 'register'
		]);
		Route::post('/register', [
			'uses' => 'RegisterController@postRegister',
			'as' => 'register'
		]);

		Route::get('/login',[
			'uses' => 'LoginController@getLogin',
			'as' => 'login'
		]);
		Route::post('/login',[
			'uses' => 'LoginController@postLogin',
			'as' => 'login'
		]);

		Route::get('/activate/{email}/{token}','EmailActivationController@activateUser');


		



	});

	Route::post('/logout',[
			'uses' => 'LoginController@logout',
			'as' => 'logout'
		]);


});


Route::group(['middleware'=>'admin'],function(){

		Route::get('/roles',[
			'uses' => 'RoleController@getRole',
			'as' => 'roles'
		]);
		Route::post('/roles',[
			'uses' => 'RoleController@postRole',
			'as' => 'roles'
		]);


		Route::get('/admin/dashboard',function(){
			return view('admin.dashboard');
		})->name('admin.dashboard');

		



	});
		

Route::get('/', function () {
    return view('home');
});



Route::get('/home', 'HomeController@index')->name('home');

