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
Route::get('/contacts/import', 'ImportContact@getImportContact');
Route::post('/contacts/import', 'ImportContact@postImportContact');

Route::get('/contacts', 'ContactController@home');
Route::get('/contacts/autocomplete', 'ContactController@tagsAutocomplete');
Route::get('/contacts/organization', 'ContactController@organization');
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts/create', 'ContactController@postCreate');
Route::get('/contacts/view/{key}', 'ContactController@viewContact');
Route::get('/contacts/delete/{id}', 'ContactController@deleteContact');
Route::get('/contacts/edit/{key}', 'ContactController@editContact');
Route::post('/contacts/edit/{key}', 'ContactController@postEditContact');

