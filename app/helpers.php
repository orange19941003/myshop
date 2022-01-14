<?php 
	function input($key='', $val='')
	{
		$get = $_GET;
		$post = $_POST;
		$input = array_merge($get, $post);
		if ($key == '')
		{
			return $input;
		}

		return array_key_exists($key, $input) ? $input[$key] : $val;
	}

	//判断是否整数
	function checkInt($num, $type=0) : bool
	{
		if ($type == 0)
		{
			//是否整数
			if(floor($num)==$num)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			//是否正整数
			if(preg_match("/^[1-9][0-9]*$/" ,$num))
			{
				return true;
			}
		}

		return false;
	}

	//统一返回函数
	function json_response(array $data, string $msg, int $code) : string
	{
		$response = [];
		$response['code'] = $code;
		$response['msg'] = $msg;
		$response['data'] = $data;

		return json_encode($response);
	}

	//检查邮箱
	function checkEmail(string $email) : bool
	{
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
	
	    return preg_match($pattern, $email);
	}		
?>