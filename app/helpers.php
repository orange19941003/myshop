<?php 
	function input($key='', $val='')
	{
		$get = $_GET;
		$post = $_POST;
		$input = array_merge($get, $post);
		if ($key=='')
		{
			return $input;
		}

		return array_key_exists($key, $input) ? $input[$key] : $val;
	}		
?>