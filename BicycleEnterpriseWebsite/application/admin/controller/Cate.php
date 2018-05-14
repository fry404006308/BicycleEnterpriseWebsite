<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Cate as ModelCate;
use app\admin\model\Article as ModelArticle;

use app\admin\controller\Base;

class Cate extends Base
{
    //前置方法
    protected $beforeActionList=[
        'delChilden'=>['only'=>'del'],
    ];

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
        //1、从页面获取id
        $id = input('id');
        //2、通过id获取这条栏目信息
        $dataOne=db('cate')->find($id);
        $this->assign('dataOne',$dataOne);
        //3、获取所有的栏目信息以形成无限分类
        $modelCate=new ModelCate();
        $data=$modelCate->catetree();
        $this->assign('data',$data);
        //4、处理表单提交
        if(request()->isPost()){
            $dataIn=input('post.');
            // dump($dataIn);die;
            $res=db('cate')->update($dataIn);
            if($res){
                $this->success('修改栏目成功','cate/lst');
            }else{
                $this->error('修改栏目失败');
            }
        }
        return view();
    }

    //删除页
    public function delete(){
        //1、获取id
        $id = input('id');

        //2、在模型中判断没有孩子了
        $modelCate=new ModelCate();
        if($modelCate->hasChild($id)){
            $this->error('当前栏目还有子栏目，无法删除!!!');
        }

        //3、在数据库里删除(没有孩子才能删除)
        $res = db('cate')->delete($id);
        if($res){
            $this->success('删除栏目成功','cate/lst');
        }else{
            $this->error('删除栏目失败');
        }

    }


    //删除前删除所有的孩子
    public function delChilden(){
        //1、获取要删除孩子的栏目id
        $id = input('id');
        //2、在模型中找到这个id对应的所有孩子，以及孩子的文章及图片
        $modelCate=new ModelCate();
        $ids=$modelCate->getChilden($id);
        $allCateIds = $ids;
        $allCateIds[] = $id;
        foreach ($allCateIds as $k => $v) {
            $modelArticle=new ModelArticle();
            $modelArticle->where(array('acateid'=>$v))->delete();
        }
        //3、在数据库中删除所有孩子
        if($ids){
            $res = db('cate')->delete($ids);
            if(!$res) $this->error('删除当前栏目的子栏目失败');
        }
        
    }

    //删除无限分类的第二种方法：删除掉这个栏目及所有的孩子
    public function del(){
        //1、在前置方法里面删掉所有孩子
        //2、在当前方法里面删除这条数据
        $id = input('id');
        $res = db('cate')->delete($id);
        if($res){
            $this->success('删除栏目成功','cate/lst');
        }else{
            $this->error('删除栏目失败');
        }
    }




}
