<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as ModelAdmin;

use app\admin\controller\Base;

class Admin extends Base
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
        $data=$modelAdmin->selectAdmin();
        $this->assign('data',$data);
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


    /**
     * [修改页：　　修改操作好像是删除操作和增加操作的一个综合体，步骤比较像删除操作+增加操作

                　　1、在页面通过链接将用户id传给控制器  

                　　2、在数据库中查询数据显示到修改页面

                　　3、在控制器中获取页面修改好的表单数据然后传到数据库]
     * @return [type] [description]
     */
    public function edit()
    {
        /**part2**/
        //获取界面传过来的id
        $id=input('id');
        //根据id查询数据
        $modelAdmin= new ModelAdmin();
        $data=$modelAdmin->findAdmin($id);
        // dump($data);die;
        //将数据传递到修改界面
        $this->assign('data',$data);

        /**part3**/
        //判断是否为用户post提交
        if(request()->isPost()){
            $data1=input('post.');
            // dump($data1);die;
            // 将修改好的数据传入到数据库
            $res=$modelAdmin->editAdmin($data1);
            if($res){
                $this->success('修改管理员成功！！',url('admin/lst'));
            }else{
                $this->error('修改管理员失败！！');
            }
            return;
        }



        return view();
    }

    //删除页
    public function delete(){
        //获取从页面传入的管理员id
        $data=input('id');
        //模型处理获取的数据
        $modelAdmin= new ModelAdmin();
        $res=$modelAdmin->deleteAdmin($data);
        if($res){
            $this->success('删除管理员成功！！',url('admin/lst'));
        }else{
            $this->error('删除管理员失败！！');
        }
    }





}
