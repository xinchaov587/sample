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

// 用户找回密码
// 显示重置密码的邮箱发送页面
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// 邮箱发送重设链接
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// 密码更新页面
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// 执行密码更新操作
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');