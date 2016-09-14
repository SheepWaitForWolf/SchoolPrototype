<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
	return view('about');
});

Route::get('/help', function () {
	return view('help');
});

/*
|--------------------------------------------------------------------------
| Services GET Routes
|--------------------------------------------------------------------------
*/

Route::get('/register', ['uses'=>'ServicesController@getRegisterPage','as'=>'get.services.RegisterPage']);

Route::get('/enrol', ['uses'=>'ServicesController@getEnrolmentPage','as'=>'get.services.showEnrolPage']);

Route::get('/absence', ['uses'=>'ServicesController@getAbsencePage','as'=>'get.services.showAbsencePage']);

Route::get('/annualupdate', ['uses'=>'ServicesController@getAnnualUpdatePage','as'=>'get.services.showAnnualUpdatePage']);

Route::get('/results', ['uses'=>'ServicesController@getResultsPage','as'=>'get.services.showResultsPage']);

Route::get('/schoolmeals', ['uses'=>'ServicesController@getSchoolMealsPage','as'=>'get.services.showSchoolMealsPage']);

Route::get('/feedback', ['uses'=>'ServicesController@getFeedbackPage','as'=>'get.services.showFeedbackPage']);

/*
|--------------------------------------------------------------------------
| Services POST Routes
|--------------------------------------------------------------------------
*/
Route::post('/register/', ['uses'=>'ServicesController@postChildPage','as'=>'post.services.postRegisterPage']);

Route::post('/feedback', ['uses'=>'ServicesController@postFeedbackPage','as'=>'post.services.postFeedbackPage']);

Route::delete('/register/child/{child_id?}', ['uses'=>'ServicesController@deleteChildPage','as'=>'delete.services.deleteChildPage']);

Route::delete('/admin/council/{local_authority_id?}', ['uses'=>'AdminController@deleteCouncilPage','as'=>'delete.admin.deleteCouncilPage']);



