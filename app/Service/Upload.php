<?php

namespace App\Service;

use App\Service\Base;

class Upload extends Base
{
	const prefix = 'myshop';

	//图片上传
	function uploadImg($file) : array
	{
		$arr = [];
		try
		{
			$folder_name = "uploads/images/" . date("Ym/d", time());
			$upload_path = public_path() . '/' . $folder_name;
			// 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
			$extension  =  strtolower($file->getClientOriginalExtension())  ?:  'png';

			// 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID 
			// 值如：1_1493521050_7BVc9v9ujP.png
			$filename = self::prefix . '_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
			$file->move($upload_path, $filename);
			$arr['code'] = 2000;
			$arr['msg'] = $folder_name . '/' . $filename;
			
			return $arr;
		} 
		catch (Exception $e)
		{
			$arr['code'] = 5001;
			$arr['msg'] = $e->getMessage();

			return 	$arr;	
		}
	}
}