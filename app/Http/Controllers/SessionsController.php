<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    
	/*
		登陆页面
	*/
    public function create()
    {
        return view('session.create');
    }

    /*
    	对登陆进行验证和处理
    */
    public function store(Request $request)
    {
       $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);

       $credentials = [
           'email'    => $request->email,
           'password' => $request->password,
       ];       

       if (Auth::attempt($credentials, $request->has('remember'))) {
           session()->flash('success', '欢迎回来！');
           return redirect()->intended(route('users.show', [Auth::user()]));
       } else {
           session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
           return redirect()->back();
       }
    }

    /*
    	退出登录
    */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect(route('home'));
    }
}