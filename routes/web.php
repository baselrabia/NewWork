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

// Auth namespace Middleware

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

		Route::get('/reset','ForgetPassController@getForgetPass')->name('reset');
		Route::post('/reset','ForgetPassController@postForgetPass')->name('reset');
		Route::get('/reset/{email}/{token}','ResetPassController@getResetPasswordByEmail')
		->name('reset-password');
		Route::post('/reset-password','ResetPassController@postResetPasswordByEmail')
		->name('reset-password');


		Route::get('/resetBySecurityQuestion',[
			'uses' => 'ResetPassController@getResetPasswordByQuestion',
			'as' => 'reset.security'
		]);
		Route::post('/resetBySecurityQuestion/stage1',[
			'uses' => 'ResetPassController@postResetPasswordByQuestion1',
			'as' => 'reset.security1'
		]);
		Route::post('/resetBySecurityQuestion/stage2',[
			'uses' => 'ResetPassController@postResetPasswordByQuestion2',
			'as' => 'reset.security2'
		]);
		Route::post('/resetBySecurityQuestion/stage3',[
			'uses' => 'ResetPassController@postResetPasswordByQuestion3',
			'as' => 'reset.security3'
		]);

		 Route::get('/login/{provider}', 'SocialController@redirect');
		 Route::get('/login/{provider}/callback','SocialController@Callback');


	});
	// user:admin Middleware with Auth namespace

		Route::get('/change-password',[
			'uses' => 'ChangePassController@getChangePassword',
			'as' => 'change-password'
		]);
		Route::post('/change-password',[
			'uses' => 'ChangePassController@postChangePassword',
			'as' => 'change-password'
		]);


		Route::post('/logout',[
			'uses' => 'LoginController@logout',
			'as' => 'logout'
		]);


});

// just Admin Middleware

Route::group(['middleware'=>'admin'],function(){

		Route::get('/roles',[
			'uses' => 'RoleController@getRole',
			'as' => 'roles'
		]);
		Route::post('/roles',[
			'uses' => 'RoleController@postRole',
			'as' => 'roles'
		]);


		Route::get('/admin',function(){
			return view('admin.dashboard');
		})->name('admin');

		Route::get('/admin/dashboard',function(){
			return view('admin.dashboard');
		})->name('admin.dashboard');


		Route::get('/upgrade','AdminController@listUsers')->name('upgrade.list.users');
		Route::get('/downgrade','AdminController@listUsers')->name('downgrade.list.users');
		Route::post('/upgrade/{username}','AdminController@upgradeUser')->name('upgrade.users');
		Route::post('/downgrade/{username}','AdminController@downgradeUser')->name('downgrade.users');


		Route::resource('/jobs','JobController');

		Route::get('/jobs/unapproved',[
			'uses' => 'JobController@listUnApproved',
			'as' => 'jobs.unapproved'
		]);

		Route::resource('/companies','CompanyController');
		


		



	});
		
// No Middleware
Route::get('/', function () {
    return view('home');
});

Route::get('/s', function () {
   
// split the phrase by any number of commas or space characters,
// which include " ", \r, \t, \n and \f

	dd(\App\Skill::assignSkills('hypertext language,  proaagramming ,trreprogramming  , programming, programming ryete'));
$keywords = preg_split("/(,  |, |,)/", "hypertext language,  proaagramming ,trreprogramming  , programming, programming ryete");
print_r($keywords);

});



Route::get('/home', 'HomeController@index')->name('home');

