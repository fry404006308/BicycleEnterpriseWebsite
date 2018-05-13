<?php
namespace app\admin\controller;
use think\Controller;

use app\admin\model\Article as ModelArticle;
use app\admin\model\Cate as ModelCate;


use app\admin\controller\Base;

class Article extends Base
{
    public function lst(){
        $dataout=db('article')->alias('a')->field('a.*,c.catename')->join('bk_cate c','a.acateid=c.id')->paginate(2);
        $this->assign('dataout',$dataout);
        return view('list');
    }

    public function add(){
        if(request()->isPost()){
            $datain=input('post.');
            $datain['time']=time();
            $modelArticle=new ModelArticle();
            //2、获取传入的文件数据
            /*在模型的事件中处理了*/
            if($modelArticle->save($datain)){
                $this->success('添加文章成功！！','article/lst');
            }else{
                $this->error('添加文章失败！！');
            }
            // dump($datain);die;
            return;
        }
        //将栏目信息显示回增加界面
        //catetree方法新增了栏目的level字段
        $modelCate=new ModelCate();
        $data=$modelCate->catetree();
        $this->assign('data',$data);

        return view();
    }


    public function edit(){
        //1、将栏目信息显示回修改界面
        $modelCate=new ModelCate();
        $dataout=$modelCate->catetree();
        $this->assign('dataout',$dataout);
        //2、将文章信息返回给修改页面显示
        $id= input('id');
        $dataArticle=db('article')->find($id);
        $this->assign('dataArticle',$dataArticle);
        //3、获取表单提交的数据
        if(request()->isPost()){
            //1、获取传入的非文件数据
            $datain=input('post.');
            $modelArticle=new ModelArticle();
            //2、获取传入的文件数据
            /*在模型的事件中处理了*/
            if($modelArticle->update($datain)){
                $this->success('修改文章成功！！','article/lst');
            }else{
                $this->error('修改文章失败！！');
            }
            // dump($datain);die;
            return;
        }

        return view();
    }



}
