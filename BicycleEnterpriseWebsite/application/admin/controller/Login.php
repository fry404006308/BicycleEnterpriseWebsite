<?php
namespace app\admin\controller;
use think\Controller;



class Login extends Controller
{
	/**
	 * 登录
	 * 1、获取页面传递过来的用户名和保密
	 * 2、在数据库中查找此用户和密码
	 * 3、如果找到数据，那就登录，否则error提示
	 * @return [type] [description]
	 */
    public function index()
    {
    	//1、获取页面传递过来的用户名和保密
    	if(request()->isPost()){
    		$datain=input('post.');
    		// dump($data);die;
    		//2、在数据库中查找此用户和密码
    		$data=db('admin')->where('username',$datain['username'])->where('password',md5($datain['password']))->find();
    		//3、如果找到数据，那就登录，否则error提示
    		if($data){
                // dump($data);die;
                //4、将登录信息写入session
                session('id', $data['id']);
                session('username', $data['username']);
                session('password', $data['password']);
                //5、设置cookie
                cookie('id', $data['id'], 3600);
                cookie('username', $data['username'], 3600);
                cookie('password', $data['password'], 3600);
                $this->success('登录成功！！',url('index/index'));
            }else{
                $this->error('用户名或者密码错误！！');
            }
    	}
        return view('login');
    }
}
