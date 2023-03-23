<?php

Route::namespace('Account')->name('account.')->group(function () {
    /** Routes for users */
    Route::prefix('users')->namespace('User')->group(function () {
        Route::get('{user}', 'UserApiController@show')->name('show');
        Route::put('{user}', 'UserApiController@update')->name('update');
    });
    /** Routes for logout */
    Route::namespace('Authenticate')->group(function () {
        Route::post('logout', 'AuthenticateApiController@logout')->name('logout');
    });
});
