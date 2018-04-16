<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
	/**
	 * 登录之后显示正确登录的用户
	 * 0、将登录的用户信息写入session
	 * 1、获取登录的用户的数据
	 * 2、将获取的数据传递到left.htm页面
	 * @return [type] [description]
	 */
    public function _initialize()
    {
        if(!session('username')){
            //如果cookie存在的话
            if(cookie('username')){
                //设置session
                session('id', cookie('id'));
                session('username',cookie('username'));
                session('password', cookie('password'));
                // dump(cookie('username'));die;
                return;
            }
            $this->error('您尚未登录系统','login/index');
        }
    }



    //退出登录
    public function logout(){
        session(null);
        cookie('user', null);
        cookie('username', null);
        cookie('password', null);
        //退出登录清空session之后要成功跳转
        $this->success('退出系统成功','login/index');
    }
}
