<?php

// 首页渲染
Route::get('/', 'StaticPagesController@home')->name('home');
// 帮助页渲染
Route::get('/help', 'StaticPagesController@help')->name('help');
// 关于页渲染
Route::get('/about', 'StaticPagesController@about')->name('about');

// 用户注册页面渲染
Route::get('signup', 'UsersController@create')->name('signup');
// 用户资源路由
Route::resource('users', 'UsersController');

// 用户登录界面渲染
Route::get('login', 'SessionsController@create')->name('login');
// 用户登录逻辑
Route::post('login', 'SessionsController@store')->name('login');
// 用户登出
Route::delete('logout', 'SessionsController@destroy')->name('logout');
// 用户资料编辑
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');

// 用户激活
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');