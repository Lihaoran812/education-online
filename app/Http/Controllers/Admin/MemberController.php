<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Admin\Member;
use DB;

class MemberController extends Controller
{
    //列表方法
    public function index()
    {
        //查询数据
        $data = Member::where('id', '>', '0')->get();
        //展示视图
        return view('admin.member.index', compact('data'));
    }

    //添加方法
    public function add()
    {
        //判断请求类型
        if (Input::method() == 'POST') {
            //实现数据保存
            //自动验证
            $result = Member::insert([
                'username' => Input::get('username'),
                'password' => bcrypt('password'),
                'gender' => Input::get('gender'),
                'mobile' => Input::get('mobile'),
                'email' => Input::get('email'),
                'avatar' => Input::get('avatar'),
                'country_id' => Input::get('country_id'),
                'province_id' => Input::get('province_id'),
                'city_id' => Input::get('city_id'),
                'county_id' => Input::get('country_id'),
                'type' => Input::get('type'),
                'status' => Input::get('status'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            //返回输出
            return $result ? '1' : '0';
        } else {
            //查询数据（国家的数据）
            $country = DB::table('area')->where('pid', '0')->get();
            return view('admin.member.add',compact('country'));
        }
    }
    //ajax四级联动获取下属地区
    public function getAreaById(){
        //接收id
        $id = Input::get('id');
        //根据id去查询下属地区
        $data = DB::table('area') -> where('pid',$id) -> get();
        //返回json数据
        return response() -> json($data);
    }
}


