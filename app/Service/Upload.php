<?php

namespace App\Service;

use App\Service\Base;
use App\Http\Enums\IndexEnum;

class Upload extends Base
{
	const prefix = 'myshop';

	//图片上传
	function uploadImg($file) : array
	{
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
			$src = $folder_name . '/' . $filename;

			return $this->success($src);
		} 
		catch (Exception $e)
		{
			$msg = $e->getMessage();

			return 	$this->error($msg);	
		}
	}
}