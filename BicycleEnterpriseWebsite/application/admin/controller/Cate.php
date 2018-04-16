<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Cate as ModelCate;

use app\admin\controller\Base;

class Cate extends Base
{
	//列表页
    public function lst()
    {
        //catetree方法新增了栏目的level字段
        $modelCate=new ModelCate();
        $data=$modelCate->catetree();
        $this->assign('data',$data);
        return view('list');
    }

    //增加页
    public function add()
    {   
        //将栏目信息显示回增加界面
        //catetree方法新增了栏目的level字段
        $modelCate=new ModelCate();
        $data=$modelCate->catetree();
        $this->assign('data',$data);

        //处理从页面提交过来的数据
        if(request()->isPost()){
            $datain=input('post.');
            $res=db('cate')->insert($datain);
            if($res){
                $this->success('添加栏目成功','cate/lst');
            }else{
                $this->error('添加栏目失败');
            }
        }
        return view();
    }


    //编辑页
    public function edit()
    {

        return view();
    }

    //删除页
    public function delete(){

    }





}
