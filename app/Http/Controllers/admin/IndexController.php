<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Base;

class IndexController extends Base
{
    public function index()
    {
    	return view('admin/index', $this->data);
    }
}
