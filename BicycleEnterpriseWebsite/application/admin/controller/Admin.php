<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as ModelAdmin;

class Admin extends Controller
{
    // //初始胡方法
    // public function _initialize(){
    //     $modelAdmin= new ModelAdmin();
    // }

	//列表页
    public function lst()
    {
        // $data=ModelAdmin::select();
        $modelAdmin= new ModelAdmin();
        $data=$modelAdmin->getAdmin();
        dump($data);die;
        return view('list');
    }

    //增加页
    public function add()
    {
        if(request()->isPost()){
            //获取post提交的数据
            $data=input('post.');
            //模型处理获取的数据
            $modelAdmin= new ModelAdmin();
            //结果
            $res=$modelAdmin->addAdmin($data);
            
            // $res=db('admin')->insert($data);
            if($res){
                $this->success('添加管理员成功！！',url('admin/lst'));
            }else{
                $this->error('添加管理员失败！！');
            }
            return;
        }
        return view();
    }

    //修改页
    public function edit()
    {
        return view();
    }
}
