<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    // 首页渲染
    public function home()
    {
        return view('static_pages.home');
    }

    // 帮助页渲染
    public function help()
    {
        return view('static_pages.help');
    }

    // 关于页渲染
    public function about()
    {
        return view('static_pages.about');
    }
}
