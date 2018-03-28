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