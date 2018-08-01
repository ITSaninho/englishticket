<?php

//Guest
Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', 'IndexController@about')->name('about');
Route::post('/savecontact', 'IndexController@sendMessage')->name('sendMessage');
Route::get('/dictionary', 'IndexController@dictionary')->name('dictionary');
Route::get('/dictionary/top/{number?}', 'IndexController@dictionary_top')->name('dictionary_top')->where('number','[0-9]+');
Route::get('/phrases/theme/{id?}', 'IndexController@phrases')->name('phrases')->where('id','[0-9]+');

/*Route::get('/search/{search?}', 'IndexController@search')->name('search')->where('search','[\w-]+');*/
Route::post('/search', 'SearchController@search')->name('search');
Route::post('/searchpost/{lang?}', 'SearchController@searchpost')->name('search_post');

//Profile
Route::group(['prefix' => 'profile', 'middleware' => ['auth']],   function() {
    Route::get('/', 'ProfileController@profile')->name('profile_index');
    Route::post('/read', 'ProfileController@read')->name('read');
    Route::get('/{pageNotFound}', ['as' => 'noroute', 'uses' => 'IndexController@noroute']);
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['admin','auth']],   function() {
    Route::get('/', 'Admin\IndexController@index')->name('admin_index');
    Route::get('/about', 'Admin\ContactController@about')->name('admin_about');
    Route::get('/contact', 'Admin\ContactController@messages')->name('admin_contact');

    //dictionary
    Route::get('/dictionary', 'Admin\IndexController@dictionary')->name('admin_dictionary');
    Route::get('/dictionary/top/{number?}', 'Admin\IndexController@dictionary_top')->name('admin_dictionary_top')->where('number','[0-9]+');

    //phrases
    Route::get('/phrases/theme/{id?}', 'Admin\IndexController@phrases')->name('admin_phrases_index')->where('id','[0-9]+');

    //add to library
    Route::post('/addtolibrary', 'Admin\IndexController@addtolibrary')->name('addtolibrary');

    //redirect
    Route::get('/{pageNotFound}', ['as' => 'noroute', 'uses' => 'IndexController@noroute']);
});

Auth::routes();
//redirect
Route::get('/{pageNotFound}', ['as' => 'noroute', 'uses' => 'IndexController@noroute']);