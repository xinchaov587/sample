<?php

// 首页渲染
Route::get('/', 'StaticPagesController@home');
// 帮助页渲染
Route::get('/help', 'StaticPagesController@help');
// 关于页渲染
Route::get('/about', 'StaticPagesController@about');