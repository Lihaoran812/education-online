<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //登录页面的展示
    public function login(){
        return view('admin.public.login');
    }

    public function check(Request $request){
        $this -> validate($request,[
            'username' => 'required|min:2|max:20',
            'password' => 'required|min:6',
            'captcha' => 'size:5|captcha'
        ]);
        $data = $request->only(['username','password']);
        $data['status'] = '2';
        $result =  Auth::guard('admin') ->attempt($data,$request->get('online'));
        if($result){
            return redirect('/admin/index/index');
        }else{
            return redirect('/admin/public/login')->withErrors([
                'loginError'=>'用户名或密码错误'
            ]);
        }
    }

    public function logout(){
        //退出
        Auth::guard('admin') -> logout();
        //跳转到登录界面
        return redirect('/admin/public/login');
    }
}
