<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Manager;

class ManagerController extends Controller
{
    //管理员列表操作
    public function index(){
        //查询数据
        $data = Manager::get();
        //展示视图
        return view('admin.manager.index',compact('data'));
    }
}
