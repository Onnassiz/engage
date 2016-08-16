<?php



Route::get('/', 'MainController@index');

Route::get('/admin','AdminAuth\AuthController@showLoginForm');
Route::post('/admin','AdminAuth\AuthController@login');
Route::get('/admin/password/reset','AdminAuth\PasswordController@resetPassword');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/logout','AdminAuth\AuthController@logout');
    Route::get('/admin/dashboard', 'Admin\Employee@index');
});

Route::auth();
Route::get('/dashboard', 'HomeController@index');
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@postProfile');

Route::get('/contacts/importAndExport', 'ImportContact@index');
Route::get('/contacts/importFileExample', 'ImportContact@downloadExample');
Route::get('/contacts/import/{option}', 'ImportContact@getImportContact');
Route::post('/contacts/import', 'ImportContact@postImportContact');
Route::get('/contacts/postImport', 'ImportContact@jsonImportContact');
Route::get('/contacts/getUploaded', 'ImportContact@getUploaded');
Route::get('/contacts/setHeaders', 'ImportContact@setHeaders');
Route::get('/contacts/cancelAndReturn', 'ImportContact@cancel');

Route::get('/contacts', 'ContactController@home');
Route::get('/contacts/autocomplete', 'ContactController@tagsAutocomplete');
Route::get('/contacts/organization', 'ContactController@organization');
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts/create', 'ContactController@postCreate');
Route::get('/contacts/view/{key}', 'ContactController@viewContact');
Route::get('/contacts/delete/{id}', 'ContactController@deleteContact');
Route::get('/contacts/edit/{key}', 'ContactController@editContact');
Route::post('/contacts/edit/{key}', 'ContactController@postEditContact');


Route::get('/publications', 'Publications@home');
Route::get('/publications/filter', 'Publications@filter');
Route::get('/publications/postFilters', 'Publications@postFilters');
Route::get('/publications/clear', 'Publications@clearFilters');
Route::get('/publications/send', 'Publications@sendPublication');
Route::post('/publications/send', 'Publications@postPublication');
Route::get('/publications/history', 'Publications@publicationHistory');

Route::get('/table', function(){
   return view('user.table');
});

