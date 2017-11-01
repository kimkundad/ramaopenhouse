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
    return view('welcome');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/questionare', 'HomeController@questionare');
Route::get('/registration', 'HomeController@registration');

Route::post('/questionare_store', 'HomeController@questionare_store');

Route::post('/registration_store', 'HomeController@registration_store');

Route::get('/thanks_questionare', 'HomeController@thanks_questionare');
Route::get('/thanks_registration', 'HomeController@thanks_registration');


Route::group(['middleware' => 'admin'], function() {

  Route::resource('admin/dashboard', 'DashboardController');
  Route::resource('admin/user_regis', 'User_regisController');
  Route::get('/admin/user_export', 'User_regisController@user_export');

  Route::get('admin/user_regis_search', 'User_regisController@user_regis_search');

  Route::resource('admin/user_questionare', 'User_questionareController');
  Route::get('/admin/questionare_export', 'User_questionareController@questionare_export');


});
