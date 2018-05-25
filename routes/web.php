<?php

Route::group(['as' => 'blog.', 'prefix' => env('APP_NAME') == 'blog' ? '/' : 'blog'], function(){
    Route::get('/', 'HomeController@index')->name('home');
}
