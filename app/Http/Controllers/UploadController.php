<?php

namespace App\Http\Controllers;

use App\Service\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
	//意义允许的扩展名
    protected $arrAllowExtension = ['jpg','png','jpeg','gif','bmp'];

    public function uploadImg(Request $request)
    {

    	$obFile = $request->file('file');
    	if (!$obFile)
        {
            return json_response('文件名错误', 4001);
        }

        // $sFileType  = $obFile->getClientMimeType(); //文件类型
        $sExtensionName = $obFile->getClientOriginalExtension();//扩展名
        if (!in_array($sExtensionName, $this->arrAllowExtension))
        {
            return json_response([], '必须是 jpeg, bmp, png, gif 格式的图片', 4001);
        }
     	$Upload = new Upload;
     	$res = $Upload->uploadImg($obFile);
     	if (empty($res))
     	{
     		//失败
     		return json_response([], "文件上传失败", 4001);
     	}
     	if ($res['code'] != 2000)
     	{
     		return json_response([], $res['msg'], 4001);
     	}

     	//成功
     	return json_response(['url' => $res['msg']], "上传成功", 2000);
    }
}
