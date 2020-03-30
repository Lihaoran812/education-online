<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Role;
use \Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    //列表
    public function index(){
        //查询
        $data = Role::where('id','>','0')->get();
        //展示视图
        return view('admin.role.index',compact('data'));
    }
    //分派权限功能
    public function assign(){
        if (Input::method()=='POST'){
            $data = Input::only(['id','auth_id']);
            $role = new Role();
            return $role -> assignAuth($data);
        }else{
            //查询一级权限
            $top = Auth::where('pid','0') -> get();
            //查询二级权限
            $cat = Auth::where('pid','!=','0') -> get();
            //获取当前角色具备的权限id集合
            $ids = Role::where('id',Input::get('id')) -> value('auth_ids');
            //展示视图
            return view('admin.role.assign',compact('top','cat','ids'));
        }

    }
}
