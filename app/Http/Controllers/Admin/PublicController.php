<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    //登录页面
    public function login()
    {
        return view('admin.public.login');
    }

    //登录验证
    public function check(Request $request)
    {
        $this->validate($request,[
           'username'=>'required|min:2',
            'password'=>'required|min:6',
            'captcha'=>'required|min:5|captcha'
        ]);

        //取出请求数据
        $data = $request->only('username','password');
        $data['status'] = 2;

        $result = Auth::guard('admin')->attempt($data,$request->get('online'));

        if ($result)
        {
            return redirect('/admin/index/index');
        }
        else
        {
            return redirect('/admin/public/login')->withErrors(
                ['loginError' => '用户名或密码错误']
            );
        }

    }

}
