<?php

Route::group(['middleware' => ['auth', config('codeeduuser.middleware.isVerified') ]], function(){
    Route::resource('categories', 'CategoriesController', ['except' => 'show']);
    Route::resource('books', 'BooksController', ['except' => 'show']);
    Route::group(['prefix' => 'trashed', 'as' => 'trashed.'], function(){
        Route::resource('books', 'BooksTrashedController', ['except' => ['edit','store', 'create']]);
    });
});

