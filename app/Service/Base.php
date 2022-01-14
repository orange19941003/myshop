<?php

namespace App\Service;

use App\Http\Enums\IndexEnum;

class Base
{
	/*
  	 *统一失败函数
  	 */
  	protected function error(string $msg, array $data = []) : array
  	{
  		$arr = [];
  		$arr['code'] = IndexEnum::ERROR_CODE;
  		$arr['msg'] = $msg;
  		$arr['data'] = $data;

  		return $arr; 
  	}

  	/*
  	 *统一成功函数
  	 */
  	protected function success(string $msg, array $data = []) : array
  	{
  		$arr = [];
  		$arr['code'] = IndexEnum::SUCCESS_CODE;
  		$arr['msg'] = $msg;
  		$arr['data'] = $data;
  		
  		return $arr; 
  	}
}
