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


// https://www.freelancer.com/get/jimkiarie8

// Route::get('/', function () {
// 	return view('cardio.index');
// });


Route::get('/map', function () {
	return view('map.map');
});

Route::get('/', function () {
	return view('welcome');
});
Route::post('/login', 'SecurityController@login')->name('login');
Route::get('/showRegistrationForm', 'Auth\RegisterController@showRegistrationForm')->name('showRegistrationForm');

Route::resource('user', 'SecurityController');
Route::post('/signin', 'SecurityController@signin')->name('signin');
Auth::routes();

Route::middleware(['auth'])->group(function() {
	Route::get('/manage/{name}', function () {
		return redirect('/');
	})->where('name', '[A-Za-z]+');

	Route::get('/calender/{name}', function () {
		return redirect('/');
	})->where('name', '[A-Za-z]+');
	
	Route::resource('manage', 'ManageController');
	Route::resource('report', 'ReportController');
	Route::resource('csv', 'CsvfileController');
	Route::resource('survey', 'SurveyController');
	Route::resource('admin', 'AdminController');
	Route::resource('docs', 'DocsController');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('events', 'EventController@index');
	Route::resource('calendar', 'EventController');
	// comments
	Route::resource('comment', 'CommentController');

	Route::post('csv/import', 'CsvfileController@import')->name('import');
	Route::resource('active', 'ActiveController');

	// overview
	Route::post('/usersinf', 'SecurityController@usersinf');
	Route::post('/orginf', 'SecurityController@orginf');


	// Get Data
	Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
	Route::post('/getData', 'ManageController@getData');
	Route::post('/getMembers', 'ManageController@getMembers');
	Route::post('/getorg', 'ManageController@getorg');
	Route::post('/getuserNo', 'ManageController@getuserNo');
	Route::post('/getReport', 'ReportController@getReport');
	// Route::post('/userReport', 'ReportController@userReport');
	Route::post('/getUser', 'ReportController@getUser');
	Route::post('/userget', 'ReportController@userget');
	Route::post('/getSurvey', 'SurveyController@getSurvey');
	Route::post('/getAdmin', 'AdminController@getAdmin');
	Route::post('/getadminNo', 'AdminController@getadminNo');
	Route::post('/getEvent', 'EventController@getEvent');
	Route::post('/getComments', 'CommentController@getComments');
	Route::post('/getCommentsNo', 'CommentController@getCommentsNo');
	Route::post('/getusersNo', 'CommentController@getusersNo');
	Route::post('/getFewComments', 'CommentController@getFewComments');
});



Route::get('/', 'HomeController@index')->name('show-home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/attachments/store', 'HomeController@store')->name('store-attachments');
Route::post('/attachments', 'HomeController@pullAttachments')->name('pull-attachments');
Route::delete('/attachments/', 'HomeController@deleteAttachment')->name('delete-attachment');
Route::post('/attachments/categories', 'HomeController@getCategories')->name('pull-categories');
Route::post('/categories', 'HomeController@storeCategories');
Route::post('/getCategory', 'HomeController@getCategory');

/*Route::post('/upload', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'image' => 'required|image64:jpeg,jpg,png'
    ]);
    if ($validator->fails()) {
        return response()->json(['errors'=>$validator->errors()]);
    } else {
        $imageData = $request->get('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        Image::make($request->get('image'))->save(public_path('images/').$fileName);
        return response()->json(['error'=>false]);
    }
});*/

// Route::get('upload', 'CsvfileController@showForm');
// Route::post('upload', 'CsvfileController@store');
// Route::post('/active', 'ManageController@active');

/*Route::get('/mult', 'HomeController@index');
Route::post('/attachments/store', 'HomeController@store')->name('store-attachments');
Route::post('/attachments', 'HomeController@pullAttachments')->name('pull-attachments');
Route::delete('/attachments/', 'HomeController@deleteAttachment')->name('delete-attachment');
Route::post('/attachments/categories', 'HomeController@getCategories')->name('pull-categories');*/