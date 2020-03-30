<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use Storage;
class UploaderController extends Controller
{
    //上传文件的处理
    public function qiniu(Request $request){
        //判断是否有文件上传成功
        if($request->hasFile('file')&& $request -> file('file') -> isValid()){
            //有文件上传
            $filename = sha1(time().$request -> file('file') -> getClientOriginalName()).$request
                -> file('file') -> getClientOriginalExtension();
            //文件保存移动
            Storage::disk('qiniu') -> put($filename,file_get_contents($request ->file('file')->path()));
            //返回数据
            $result = [
                'errorCode'   => '0',
                'errorMsg'    => '',
                'successMsg'  => '文件上传成功',
                'path'        => Storage::disk("qiniu")->getDriver()->downloadUrl($filename)
            ];
        }else{
            //没有文件被上传或者出错
            $result = [
                'errorCode'     =>   '000001',
                'errorMsg'      =>   $request -> file('file') -> getErrorMessage(),
            ];
        }
        //返回信息
        return response() ->json($result);

    }
}
