<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Enums\IndexEnum;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;
    protected $admin_id;
  	
  	public function __construct(Request $request)
  	{
        $this->data = [];
        $this->middleware(function ($request, $next) {
    		$this->data['name'] = $request->session()->get('name');

    		return $next($request);
        });
  	}

    /*
  	 *统一失败函数
  	 */
  	protected function error(string $msg) : array
  	{
  		$arr = [];
  		$arr['code'] = IndexEnum::ERROR_CODE;
  		$arr['msg'] = $msg;

  		return $arr; 
  	}

  	/*
  	 *统一成功函数
  	 */
  	protected function success(string $msg) : array
  	{
  		$arr = [];
  		$arr['code'] = IndexEnum::SUCCESS_CODE;
  		$arr['msg'] = $msg;

  		return $arr; 
  	}
}
