<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', ['title' => '白酒兴国']);
    }

    public function show()
    {
        return '牛逼';
    }
}
