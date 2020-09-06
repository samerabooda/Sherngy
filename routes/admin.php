<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::prefix('admin')->group(function () {
            Route::get('login','LoginController@index')->name('admin.login');
            Route::post('login/post','LoginController@loginPost')->name('login-admin');


            Route::group(['middleware' => 'authadmin'], function () {
                Route::get('/','dashboardcontroller@index')->name('dashboard');

                //chat aside
                Route::resource('chat','ChatController');

            });
        });

    });



?>
