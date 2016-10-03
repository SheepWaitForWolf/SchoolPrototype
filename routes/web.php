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

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));


/*
|--------------------------------------------------------------------------
| Services GET Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', 'HomeController@index');

Route::get('/registration/{child_id?}', ['uses'=>'ServicesController@getRegistrationPage','as'=>'get.services.getRegistrationPage']);

Route::get('/absence/{absence_id?}', ['uses'=>'ServicesController@getAbsencePage','as'=>'get.services.getAbsencePage']);

Route::get('/enrol', ['uses'=>'ServicesController@getEnrolmentPage','as'=>'get.services.showEnrolPage']);

Route::get('/absence', ['uses'=>'ServicesController@getAbsencePage','as'=>'get.services.getAbsencePage']);

Route::get('/annualupdate', ['uses'=>'ServicesController@getAnnualUpdatePage','as'=>'get.services.showAnnualUpdatePage']);

Route::get('/results', ['uses'=>'ServicesController@getResultsPage','as'=>'get.services.showResultsPage']);

Route::get('/schoolmeals', ['uses'=>'ServicesController@getSchoolMealsPage','as'=>'get.services.showSchoolMealsPage']);

Route::get('/getschools', ['uses'=>'ServicesController@getSchools', 'as'=>'get.services.getSchools']);



/*
|--------------------------------------------------------------------------
| Services POST Routes
|--------------------------------------------------------------------------
*/
Route::post('/registration/{child_id?}', ['uses'=>'ServicesController@postRegistrationPage','as'=>'post.services.postRegistrationPage']);

Route::post('/absence/{absence_id?}', ['uses'=>'ServicesController@postAbsencePage','as'=>'post.services.postAbsencePage']);

Route::post('/feedback', ['uses'=>'ServicesController@postFeedbackPage','as'=>'post.services.postFeedbackPage']);


Route::get('/feedback/{feedback_id?}', ['uses'=>'ServicesController@getfeedbackPage','as'=>'get.services.getFeedbackPage']);


Route::put('/feedback/{feedback_id?}', ['uses'=>'ServicesController@updateFeedbackPage','as'=>'put.services.updateFeedbackPage']);

Route::put('/registration/{child_id?}', ['uses'=>'ServicesController@updateRegistrationPage','as'=>'put.services.updateRegistrationPage']);
Auth::routes();



/*
|--------------------------------------------------------------------------
| Services DELETE Routes
|--------------------------------------------------------------------------
*/

Route::delete('registration/{child_id?}', ['uses'=>'ServicesController@deleteRegistrationPage','as'=>'delete.services.deleteRegistrationPage']);

Route::delete('feedback/{feedback_id?}', ['uses'=>'ServicesController@deleteFeedbackPage','as'=>'delete.services.deleteFeedbackPage']);

Route::delete('absence/{absence_id?}', ['uses'=>'ServicesController@deleteAbsencePage','as'=>'delete.services.deleteAbsencePage']);

/*
|--------------------------------------------------------------------------
| SimpleSAML based Routes
|--------------------------------------------------------------------------
*/

Route::get('/userhome',['uses'=>'SimpleSAMLPHPController@getUserData','as'=>'get.simplesamlphp.userdata']);