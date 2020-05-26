<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController')->except(['create']);
Route::get('/posts/{post}/validator', 'PostController@validator')->name('posts.validator');
Route::get('/posts/create/validatorCreate', 'PostController@validatorCreate')->name('posts.validatorCreate');